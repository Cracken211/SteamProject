<?php

require_once("./includes/functions.inc.php");
include("header.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload Game Form</title>
    <link rel="stylesheet" href="steam-style.css">
</head>

<body>
    <div class="upload-bodyContainer">
        <form class="upload-form" method="POST" action="includes/upload.inc.php">
            <h1 class="upload-title">Upload Your Game</h1>
            <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                echo "<p class='upload-message'>$message</p>";
            }
            ?>
            <div class="form-group">
                <label for="game_title" class="upload-label">Title:</label>
                <input type="text" id="game_title" name="game_title" class="upload-input" required maxlength="20"
                    minlength="2" placeholder="Max length 20 characters">
            </div>
            <div class="form-group">
                <label for="game_description" class="upload-label">Description:</label>
                <textarea id="game_description" name="game_description" class="upload-input" required maxlength="600"
                    placeholder="Max lenght 600 characters"></textarea>
            </div>
            <div class="form-group">
                <label for="game_genre" class="upload-label">Genre:</label>
                <select id="game_genre" name="game_genre" class="upload-input" required>
                    <option value="">Select a genre</option>
                    <option value="action">Action</option>
                    <option value="adventure">Adventure</option>
                    <option value="rpg">Role-playing</option>
                    <option value="fps">First-person shooter</option>
                    <option value="strategy">Strategy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="game_price" class="upload-label">Price:</label>
                <input type="number" id="game_price" name="game_price" class="upload-input" required max="999"
                    placeholder="Price in United States Dollar">
            </div>
            <div class="form-group">
                <label for="game_image" class="upload-label">Image:</label>
                <input type="file" id="game_image" name="game_image" class="upload-input">
            </div>
            <input type="submit" value="Upload Game" class="upload-button">
        </form>
    </div>
</body>

</html>