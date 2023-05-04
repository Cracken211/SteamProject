<?php
require_once("functions.inc.php");

if (isset($_POST["game_title"], $_POST["game_description"], $_POST["game_genre"], $_POST["game_price"])) {
    if (isset($_FILES["game_image"])) {
        $game_title = $_POST["game_title"];
        $game_description = $_POST["game_description"];
        $game_genre = $_POST["game_genre"];
        $game_price = $_POST["game_price"];
        $game_image = $_FILES["game_image"];
    } else {
        header("location: /steamProject/upload.php?message=File.");

    }

    insertGame($game_title, $game_description, $game_genre, $game_price, $_SESSION["uid"], $game_image);

} else {

    header("location: /steamProject/upload.php?message=Not all boxes are filled in or selected.");
}
?>