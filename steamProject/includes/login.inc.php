<?php
require("functions.inc.php");

$username = $_POST["uid"];
$password = $_POST["pass"];
$email = $_POST["email"];

$checkUserResult = checkUser($email, $password);
if ($checkUserResult === -1) {
    header("location: ../login.php?message=User Not Found");
    echo "<p></p>";

} elseif ($checkUserResult === 1) {
    header("location: ../index.php?");
    $_SESSION["email"] = $email;
} elseif ($checkUserResult === 0) {
    header("location: ../login.php?message=Password Incorrect");
    echo "<p>Password Incorrect!</p>";
} else {
    header("location: ../login.php?message=idk");
    echo "<p>idk</p>";

}