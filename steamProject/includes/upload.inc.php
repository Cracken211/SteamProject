<?php
require_once("functions.inc.php"); // Include external functions file

function addToLibrary($user, $game) // Function to add a game to the user's library
{
    global $pdo;

    $statement = $pdo->prepare("INSERT INTO userLibrary(user, GameID) VALUES(:user, :GameID)"); // Prepare SQL statement for inserting user and game IDs into userLibrary table
    $statement->execute([":user" => $user, ":GameID" => $game]); // Execute the prepared statement with the provided user and game IDs

    return true; // Return true indicating successful addition to the library
}

function validateAndOrStoreImage($image) // Function to validate and store an uploaded image
{
    global $pdo; 

    $allowed_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF); // Allowed image types (JPEG, PNG, GIF)
    $detected_type = exif_imagetype($image["tmp_name"]); // Detect the image type based on the uploaded file

    if (!in_array($detected_type, $allowed_types)) { // Check if the detected image type is not in the allowed types
        return 1; // Return 1 indicating that it's not an image
    }
    
    //(Här hade jag tubbel i och med att jag använde steamProject/.../... vilket jag inte skulle göra)
    $image_path = "../user-images/" . uniqid() . "-" . $image["name"]; // Generate a unique image path based on the uploaded file's name. 
    move_uploaded_file($image["tmp_name"], $image_path); // Move the uploaded image to the specified path

    return $image_path; // Return the image path indicating successful validation and storage
}

if (isset($_POST["game_title"], $_POST["game_description"], $_POST["game_genre"], $_POST["game_price"])) { // Check if all the required fields for adding a game are set
    if (isset($_FILES["game_image"])) { // Check if an image file is uploaded
        // Fetch game data
        $game_title = $_POST["game_title"]; 
        $game_description = $_POST["game_description"]; 
        $game_genre = $_POST["game_genre"]; 
        $game_price = $_POST["game_price"]; 
        $game_image = $_FILES["game_image"];

    } else {
        header("location: /steamProject/upload.php?message=File."); // Redirect to the upload page with an error message regarding the missing image file
    }

    insertGame($game_title, $game_description, $game_genre, $game_price, $_SESSION["uid"], $game_image); // Call the insertGame function with the provided game details and user ID

} else {
    header("location: /steamProject/upload.php?message=Not all boxes are filled in or selected."); // Redirect to the upload page with an error message indicating that not all required fields are filled or selected
}
?>
