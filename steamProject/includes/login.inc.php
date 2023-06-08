<?php
require("functions.inc.php");

$username = $_POST["uid"];
$password = $_POST["pass"];
$email = $_POST["email"];

// Function to check if user exists and validate password
function checkUser($email, $password)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $statement->execute(["email" => $email]);

    $user = $statement->fetch();
    if (!$user) {
        return -1; // user not found
    } else {
        if (password_verify($password, $user["password"])) {
            $_SESSION["uid"] = $user["id"];
            return 1; // password correct
        } else {
            return 0; // password incorrect
        }
    }
}

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
