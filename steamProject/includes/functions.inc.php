<?php
require("dbh.inc.php");
session_start();

// if (!isset($_SESSION["uid"]) && ($_GET["message"] != "login" && $_GET["message"] != "signup")) {
//     header("location: http://localhost:8080/steamProject/login.php?message=login");
//     exit;
// }

$currency = "$";

function userCreate($username, $password, $email)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
    $statement->execute(array(":username" => $username, ":email" => $email));
    $user = $statement->fetch();


    if ($user) {
        return 0;
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO user(username, password, email) VALUES(:username, :password, :email);");
        if ($statement->execute(array(":username" => $username, ":password" => $hashedPassword, ":email" => $email))) {
            // User was created
            return 1;
        } else {
            // An error while trying to create the user
            return -1;
        }
    }
}


function checkUser($email, $password)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $statement->execute(["email" => $email]);

    $user = $statement->fetch();
    if (!$user) {
        return -1; // user not found
    } else {
        if (password_verify($password, $user["password"])) {
            $_SESSION["uid"] = $user["id"];
            return 1;
        } else {
            return 0;
        }
    }
}

function fetchTheme($id)
{
    global $pdo;

    $gradient = [
        "blue" => ["0,27,121,1", "3,128,143,1", "82,14,191,1"],
        "red" => ["150,66,37,1", "121,0,28,1", "240,0,0,1"],
        "purple" => ["2,0,36,1", "140,1,167,1", "0,212,255,1"],
        "green" => ["104,121,0,1", "3,143,45,1", "14,191,150,1"],
        "black" => ["91,91,90,1", "33,31,31,1", "0,0,0,1"],
        "pink" => ["114,52,152,1", "208,75,231,1", "173,27,175,1"]
    ];

    $statement = $pdo->prepare("SELECT theme FROM user WHERE id = :id");
    $statement->execute(["id" => $id]);

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return false;
    } else {
        $theme = $gradient[$row["theme"]];
        return $theme;
    }
}

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
function themeChange($theme)
{
    global $pdo;

    $id = $_SESSION["uid"];

    $statement = $pdo->prepare("UPDATE user SET theme = :theme WHERE id = :id");
    $statement->execute(["theme" => $theme, "id" => $id]);

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

function fetchGame($category = "", $sortOrder = "")
{
    global $pdo;
    global $currency;

    $category = strtolower($category);

    $statement = $pdo->prepare("SELECT gameID FROM gamesdb");
    $statement->execute();

    $existing_gameIDs = $statement->fetchAll(PDO::FETCH_COLUMN);

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
        // <div class="game-card-image" style="background-image: url(\'steamProject/' . $gameIMG . '\')"></div>


        echo '
            <div class="game-card" onclick="location.href=\'?message=store&page=' . $gameID . '\'">
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
}




function searchGame($searchQuery = "")
{
    global $pdo;
    global $currency;

    $searchCondition = "";

    if (!empty($searchQuery)) {
        $searchCondition = "AND title LIKE :searchQuery";
        $searchQuery = "%$searchQuery%";
    } else {
        echo "<script>alert('Invalid search query')</script>";
        exit();
    }

    $statement = $pdo->prepare("SELECT * FROM gamesdb WHERE 1 $searchCondition ORDER BY GameID ASC");
    $statement->bindParam(":searchQuery", $searchQuery);
    $statement->execute();

    $games = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($games as $game) {
        $gameID = $game["GameID"];
        $title = $game["title"];
        $price = $game["price"];
        $gameIMG = $game["path"];

        echo '
            <div class="game-card" onclick="location.href=\'?message=store&page=' . $gameID . '\'">
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
}

function fetchUserLibrary()
{

}

function sortBy()
{

}
?>