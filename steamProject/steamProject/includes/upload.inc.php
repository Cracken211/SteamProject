<?php
require_once("functions.inc.php");

function addToLibrary($user, $game)
{
    global $pdo;

    $statement = $pdo->prepare("INSERT INTO userLibrary(user, GameID) VALUES(:user, :GameID)");
    $statement->execute([":user" => $user, ":GameID" => $game]);

    return true;
}

function validateAndOrStoreImage($image)
{
    global $pdo;

    $allowed_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
    $detected_type = exif_imagetype($image["tmp_name"]);
    if (!in_array($detected_type, $allowed_types)) {
        return 1; // Not an image
    }

    $image_path = "../user-images/" . uniqid() . "-" . $image["name"];
    move_uploaded_file($image["tmp_name"], $image_path);

    return $image_path;
}

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