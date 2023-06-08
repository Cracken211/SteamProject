<?php
require("dbh.inc.php");
session_start();

// if (!isset($_SESSION["uid"]) && ($_GET["message"] != "login" && $_GET["message"] != "signup")) {
//     header("location: http://localhost:8080/steamProject/login.php?message=login");
//     exit;
// }

$currency = "$";



function fetchUser($id)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $statement->execute(["id" => $id]);

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return false;
    } else {
        return $row;
    }
}


function checkSession($id)
{
    if (!isset($id)) {
        header("location: ./login.php?message=Session expired. Please try logging in again");
    }
}

function generateRandomID($length)
{
    global $pdo;

    $id = '';

    $statement = $pdo->prepare("SELECT GameID FROM gamesdb");
    $statement->execute();

    $existing_ids = $statement->fetchAll(PDO::FETCH_COLUMN);

    do {
        $id = '';
        for ($i = 0; $i < $length; $i++) {
            $id .= mt_rand(0, 9);
        }
        var_dump($id);
    } while (in_array($id, $existing_ids));

    return $id;
}

function insertGame($title, $description, $genre, $price, $sessionId, $image_validate)
{
    global $pdo;

    $price = (float) $price;
    $IDlength = 6;

    $statement = $pdo->prepare("SELECT title FROM gamesdb WHERE title = :title");
    $statement->execute(["title" => $title]);
    $existing_title = $statement->fetch(PDO::FETCH_ASSOC);
    if ($existing_title) {
        header("location: /steamProject/upload.php?message=Game title already exists");
    } else {

        $user = fetchUser($sessionId);
        if ($user !== false) {
            $path = validateAndOrStoreImage($image_validate);
            var_dump($path);
            if ($path !== 1) {
                $user_id = $user["id"];
                $GameID = generateRandomID($IDlength);
                $statement = $pdo->prepare("INSERT INTO gamesdb(GameID, title, description, genre, price, fromUser, path) VALUES (:GameID, :title, :description, :genre, :price, :fromUser, :path)");
                $statement->execute(["GameID" => $GameID, "title" => $title, "description" => $description, "genre" => $genre, "price" => $price, "fromUser" => $user_id, "path" => $path]);
                header("location: /steamProject/upload.php?message=Thanks for uploading your game to steam!");
            } else {
                header("location: /steamProject/upload.php?message=Wrong Image Type ");

            }
        } else {
            header("location: /steamProject/upload.php?message=Unknown error. Please try refreshing your session");
        }
    }
}

function fetchGame($category = "", $sortOrder = "", $gameID)
{
    global $pdo;
    global $currency;

    $category = strtolower($category);

    $statement = $pdo->prepare("SELECT gameID FROM gamesdb");
    $statement->execute();

    $existing_gameIDs = $statement->fetchAll(PDO::FETCH_COLUMN);
    if (empty($gameID)) {
        foreach ($existing_gameIDs as $gameID) {

            if (empty($category) && empty($sortOrder)) {
                $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
                $statement->execute(["GameID" => $gameID]);
            } else {
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

            echo '
                    <div class="game-card" onclick="location.href=\'?page=store&g=' . $gameID . '\'">
                    <div class="game-card-image" style="background-image: url(\'' . $gameIMG . '\')"></div>

                        <div class="game-card-info">
                            <div class="game-card-title">
                                ' . $title . '
                            </div>
                            <div class=\'game-card-price\'>
                                ' . $price . '
                            </div>
                        </div>
                    </div>
                ';
        }
        // return $game;
    } else {
        $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
        $statement->execute(["GameID" => $gameID]);

        $info = $statement->fetch(PDO::FETCH_ASSOC);

        return $info;
    }
}
function fetchGameInfo($gameID)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT gameID FROM gamesdb");
    $statement->execute();

    $gameIDs = $statement->fetchAll();

    // var_dump($gameIDs);

    if (empty($gameID) || in_array($gameID, $gameIDs)) {
        trigger_error("Invalid game", E_USER_ERROR); // Manual trigger :)
    } else {
        $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
        $statement->execute(["GameID" => $gameID]);

        $gameInfo = $statement->fetch(PDO::FETCH_ASSOC);

        var_dump($gameInfo);
        // return
    }

}

function fetchUserLibrary($user, $game)
{
    global $pdo;
    if (isset($user)) {
        $statement = $pdo->prepare("SELECT * FROM userlibrary WHERE user = :user");
        $statement->execute([":user" => $user]);

        if (isset($game)) {
            if ($statement->rowCount() > 0) {
                return true;
            }
        }

        $games = $statement->fetchAll(PDO::FETCH_ASSOC);    

        // var_dump($games);
        // var_dump($user);
        // var_dump($game);
        foreach ($games as $game) {
            $gameID = $game["GameID"];
            $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE GameID = :GameID");
            $statement->execute([":GameID" => $gameID]);
        
            $fetchedGame = $statement->fetch(PDO::FETCH_ASSOC);
        
            // Check if the game exists in the database
            if ($fetchedGame) {
                $title = $fetchedGame["title"];
                $price = $fetchedGame["price"];
                $gameIMG = $fetchedGame["path"];
        
                echo '
                <div class="game-card-container">
                    <div class="game-card" onclick="location.href=\'?page=store&g=' . $gameID . '\'">
                        <div class="game-card-image" style="background-image: url(\'' . $gameIMG . '\')"></div>
                        <div class="game-card-info">
                            <div class="game-card-title">
                                ' . $title . '
                            </div>
                            <div class=\'game-card-price\'>
                                ' . $price . '
                            </div>
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