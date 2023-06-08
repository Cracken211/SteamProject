<?php
require("dbh.inc.php");
session_start();

// if (!isset($_SESSION["uid"]) && ($_GET["message"] != "login" && $_GET["message"] != "signup")) {
//     header("location: http://localhost:8080/steamProject/login.php?message=login");
//     exit;
// }

$currency = "$";



// Fetch user function definition
function fetchUser($id)
{
    global $pdo; // Access the global $pdo object

    // Prepare and execute the SQL statement to select user data based on the ID
    $statement = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $statement->execute(["id" => $id]);

    // Fetch the user data as an associative array
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if a row was returned
    if (!$row) {
        return false; // User not found, return false
    } else {
        return $row; // Return the user data
    }
}

// Check if the session ID is set
function checkSession($id)
{
    if (!isset($id)) {
        // Redirect the user to the login page with an error message
        header("location: ./login.php?message=Session expired. Please try logging in again");
    }
}

// Generate a random ID with a specified length
function generateRandomID($length)
{
    global $pdo; // Access the global $pdo object

    $id = '';

    // Fetch existing GameIDs from the database
    $statement = $pdo->prepare("SELECT GameID FROM gamesdb");
    $statement->execute();

    $existing_ids = $statement->fetchAll(PDO::FETCH_COLUMN);

    // Generate a random ID until it is unique
    do {
        $id = '';
        for ($i = 0; $i < $length; $i++) {
            $id .= mt_rand(0, 9);
        }
        var_dump($id);
    } while (in_array($id, $existing_ids));

    return $id;
}

// Insert a game into the database
function insertGame($title, $description, $genre, $price, $sessionId, $image_validate)
{
    global $pdo; // Access the global $pdo object

    $price = (float) $price;
    $IDlength = 6;

    // Check if the game title already exists in the database
    $statement = $pdo->prepare("SELECT title FROM gamesdb WHERE title = :title");
    $statement->execute(["title" => $title]);
    $existing_title = $statement->fetch(PDO::FETCH_ASSOC);

    if ($existing_title) {
        header("location: /steamProject/upload.php?message=Game title already exists");
    } else {
        // Fetch the user data using the session ID
        $user = fetchUser($sessionId);

        if ($user !== false) {
            $path = validateAndOrStoreImage($image_validate);
            var_dump($path);

            if ($path !== 1) {
                $user_id = $user["id"];
                $GameID = generateRandomID($IDlength);

                // Insert the game data into the database
                $statement = $pdo->prepare("INSERT INTO gamesdb(GameID, title, description, genre, price, fromUser, path) VALUES (:GameID, :title, :description, :genre, :price, :fromUser, :path)");
                $statement->execute(["GameID" => $GameID, "title" => $title, "description" => $description, "genre" => $genre, "price" => $price, "fromUser" => $user_id, "path" => $path]);

                header("location: /steamProject/upload.php?message=Thanks for uploading your game to steam!");
            } else {
                header("location: /steamProject/upload.php?message=Wrong Image Type");
            }
        } else {
            header("location: /steamProject/upload.php?message=Unknown error. Please try refreshing your session");
        }
    }
}

// Fetch games based on category, sort order, and/or game ID
function fetchGame($category = "", $sortOrder = "", $gameID)
{
    global $pdo;
    global $currency;

    $category = strtolower($category);

    // Fetch existing game IDs from the database
    $statement = $pdo->prepare("SELECT gameID FROM gamesdb");
    $statement->execute();
    $existing_gameIDs = $statement->fetchAll(PDO::FETCH_COLUMN);

    if (empty($gameID)) {
        foreach ($existing_gameIDs as $gameID) {
            if (empty($category) && empty($sortOrder)) {
                // Fetch all game data
                $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
                $statement->execute(["GameID" => $gameID]);
            } else {
                // Fetch game data based on category and sort order
                $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE genre = :category ORDER BY price $sortOrder");
                $statement->bindParam(":category", $category);
                $statement->bindParam(":sortOrder", $sortOrder);
                $statement->execute();
            }

            $game = $statement->fetch(PDO::FETCH_ASSOC);

            $gameID = $game["GameID"];
            $title = $game["title"];
            $price = $game["price"];
            $gameIMG = $game["path"];

            // Display the game information
            echo '
                <div class="game-card" onclick="location.href=\'?page=store&g=' . $gameID . '\'">
                    <div class="game-card-image" style="background-image: url(\'' . $gameIMG . '\')"></div>
                    <div class="game-card-info">
                        <div class="game-card-title">' . $title . '</div>
                        <div class=\'game-card-price\'>' . $price . '</div>
                    </div>
                </div>
            ';
        }
    } else {
        // Fetch game information based on the specified game ID
        $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
        $statement->execute(["GameID" => $gameID]);
        $info = $statement->fetch(PDO::FETCH_ASSOC);

        return $info;
    }
}

// Fetch detailed game information based on the game ID
function fetchGameInfo($gameID)
{
    global $pdo;

    // Fetch existing game IDs from the database
    $statement = $pdo->prepare("SELECT gameID FROM gamesdb");
    $statement->execute();
    $gameIDs = $statement->fetchAll();

    if (empty($gameID) || in_array($gameID, $gameIDs)) {
        trigger_error("Invalid game", E_USER_ERROR);
    } else {
        // Fetch detailed game information based on the game ID
        $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
        $statement->execute(["GameID" => $gameID]);
        $gameInfo = $statement->fetch(PDO::FETCH_ASSOC);

        var_dump($gameInfo);
        // return
    }
}

// Fetch the user library and display game information
function fetchUserLibrary($user, $game)
{
    global $pdo;

    if (isset($user)) {
        // Fetch games from the user's library
        $statement = $pdo->prepare("SELECT * FROM userlibrary WHERE user = :user");
        $statement->execute([":user" => $user]);

        if (isset($game)) {
            // Check if the specified game is in the user's library
            if ($statement->rowCount() > 0) {
                return true;
            }
        }

        $games = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($games as $game) {
            $gameID = $game["GameID"];

            // Fetch game information from the gamesdb table
            $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
            $statement->execute([":GameID" => $gameID]);
            $fetchedGame = $statement->fetch(PDO::FETCH_ASSOC);

            // Check if the game exists in the database
            if ($fetchedGame) {
                $title = $fetchedGame["title"];
                $price = $fetchedGame["price"];
                $gameIMG = $fetchedGame["path"];

                // Display the game information
                echo '
                <div class="game-card-container">
                    <div class="game-card" onclick="location.href=\'?page=store&g=' . $gameID . '\'">
                        <div class="game-card-image" style="background-image: url(\'' . $gameIMG . '\')"></div>
                        <div class="game-card-info">
                            <div class="game-card-title">' . $title . '</div>
                            <div class=\'game-card-price\'>' . $price . '</div>
                        </div>
                    </div>
                </div>
                <style>
                    .game-card-container {
                        width: 100vw;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                </style>
                ';
            }
        }
    }
}



function sortBy()
{

}
?>
