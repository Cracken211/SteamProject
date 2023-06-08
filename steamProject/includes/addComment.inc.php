<?php
require_once("functions.inc.php");

function addComment($gameID, $comment)
{
    global $pdo;

    $fromUser = $_SESSION["uid"]; // Assuming you have the user's session UID stored in the $_SESSION["uid"] variable

    // Insert the comment into the gameComments table
    $statement = $pdo->prepare("INSERT INTO gameComments (gameid, comment, unixTimestamp, fromUser) VALUES (:gameID, :comment, UNIX_TIMESTAMP(), :fromUser)");
    $statement->execute([
        "gameID" => $gameID,
        "comment" => $comment,
        "fromUser" => $fromUser
    ]);

    return $statement->rowCount() > 0;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the comment data is submitted
    if (isset($_POST["comment"]) && isset($_GET["g"])) {
        $gameID = $_GET["g"];
        $comment = $_POST["comment"];

        // Validate and sanitize the comment
        $comment = trim($comment);
        if (empty($comment)) {
            header("Location: ../store.php?g=$gameID&message=Comment cannot be empty");
            exit();
        }

        // Add the comment to the database
        if (addComment($gameID, $comment)) {
            header("Location: ../store.php?g=$gameID&message=Comment added successfully");
            exit();
        } else {
            header("Location: ../store.php?g=$gameID&message=Failed to add comment");
            exit();
        }
    }
} else {
    header("Location: ../store.php");
    exit();
}
