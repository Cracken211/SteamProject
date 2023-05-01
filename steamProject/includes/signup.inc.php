<?php
include("functions.inc.php");

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