<?php
require("functions.inc.php");

function themeChange($theme)
{
    global $pdo;

    $id = $_SESSION["uid"];

    $statement = $pdo->prepare("UPDATE user SET theme = :theme WHERE id = :id");
    $statement->execute(["theme" => $theme, "id" => $id]);

}

if(!themeChange($_POST["theme"])){
    header("location: /steamProject/profileEdit.php?message=Edit Success");
} else {
    header("location: /steamProject/profileEdit.php?message=Edit Failed");
}
?>