<?php
require("functions.inc.php");

// Function to change the theme for a user
function themeChange($theme)
{
    global $pdo;

    $id = $_SESSION["uid"]; // Get the user ID from the session

    // Update the user's theme in the database
    $statement = $pdo->prepare("UPDATE user SET theme = :theme WHERE id = :id");
    $statement->execute(["theme" => $theme, "id" => $id]);

}

// Call the themeChange function with the provided theme from the form
if (!themeChange($_POST["theme"])) {
    header("location: /steamProject/profileEdit.php?message=Edit Success"); // Theme change successful
} else {
    header("location: /steamProject/profileEdit.php?message=Edit Failed"); // Theme change failed
}
?>
