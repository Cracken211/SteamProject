<?php
include("functions.inc.php");

// Function to create a new user
function userCreate($username, $password, $email)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
    $statement->execute(array(":username" => $username, ":email" => $email));
    $user = $statement->fetch();

    if ($user) {
        return 0; // User with the same username or email already exists
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO user(username, password, email) VALUES(:username, :password, :email);");
        if ($statement->execute(array(":username" => $username, ":password" => $hashedPassword, ":email" => $email))) {
            return 1; // User created successfully
        } else {
            return -1; // Error occurred while creating the user
        }
    }
}

// Redirect to index.php if the required form fields are not set
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
            header("location: ../signup.php?message=An Error Occurred");
        } else {
            header("location: ../index.php?message=signup redirect");
        }
    }
} else {
    header("location: ../signup.php?message=Invalid Email");
}
?>
