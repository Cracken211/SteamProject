<?php
require("includes/functions.inc.php");
require_once("backgrounds.php");
include("header.php");

checkSession($_SESSION["uid"]);

function fetchTheme($id) // Declare function that attempts to fetch user profile using session ID
{
    global $pdo;

    $statement = $pdo->prepare("SELECT theme FROM user WHERE id = :id"); // SQL statement to fetch user using session id
    $statement->execute(["id" => $id]);

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return false;
    } else {
        // $theme = $gradient[$row["theme"]];
        return $row["theme"];
    }
}
?>

<body>
    <div class="background-container-profile">
        <?php
        $theme = fetchTheme($_SESSION["uid"]);
        echo implode(",", $backgrounds[$theme]);
        ?>
    </div>
</body>