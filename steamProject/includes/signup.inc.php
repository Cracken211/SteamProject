<?php
include("functions.inc.php");

function userCreate($username, $password, $email)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
    $statement->execute(array(":username" => $username, ":email" => $email));
    $user = $statement->fetch();


    if ($user) {
        return 0;
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO user(username, password, email) VALUES(:username, :password, :email);");
        if ($statement->execute(array(":username" => $username, ":password" => $hashedPassword, ":email" => $email))) {
            // User was created
            return 1;
        } else {
            // An error while trying to create the user
            return -1;
        }
    }
}

if (!isset($_POST["uid"]) && !isset($_POST["pass"]) && !isset($_POST["email"]) && !isset($_POST["passrepeat"])) {
    header("location: ../index.php");
    exit();
}

$username = $_POST["uid"];
$password = $_POST["pass"];
$email = $_POST["email"];
$passrepeat = $_POST["passrepeat"];

if (str_contains($email, "@")) {
    if ($password != $passrepeat) {
        header("location: ../signup.php?message=Passwords Do Not Match");
    } else {

        $result = userCreate($username, $password, $email);

        if ($result == 0) {
            header("location: ../signup.php?message=Username Or Email Already in use");
        } else if ($result == -1) {
            header("location: ../signup.php?message= An Error Occured");
        } else {
            header("location: ../index.php?message=signup redirect"); // Fix else statament
        }

    }
} else {
    header("location: ../signup.php?message=Invalid Email");
}
?>