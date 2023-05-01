<?php
require_once("functions.inc.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["game_title"], $_POST["game_description"], $_POST["game_genre"], $_POST["game_price"])) {
        $game_title = $_POST["game_title"];
        $game_description = $_POST["game_description"];
        $game_genre = $_POST["game_genre"];
        $game_price = $_POST["game_price"];

        insertGame($game_title, $game_description, $game_genre, $game_price, $_SESSION["uid"]);
        
    } else {
        header("location: ./upload.php?message=Not all boxes are filled in or selected.");
    }
}


?>
