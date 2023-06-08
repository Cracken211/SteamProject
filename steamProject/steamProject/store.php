<?php
require_once("./includes/functions.inc.php");
include("header.php");

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
}

function formatTimestamp($timestamp) {
    $currentTime = time();
    $elapsedTime = $currentTime - $timestamp;

    if ($elapsedTime < 60) {
        return "Posted " . $elapsedTime . "s ago";
    } elseif ($elapsedTime < 3600) {
        $minutes = floor($elapsedTime / 60);
        return "Posted " . $minutes . "m ago";
    } elseif ($elapsedTime < 86400) {
        $hours = floor($elapsedTime / 3600);
        return "Posted " . $hours . "h ago";
    } else {
        $days = floor($elapsedTime / 86400);
        return "Posted " . $days . "d ago";
    }
}

if (!isset($_GET["g"])) {
    echo '
    <div class="store-search" image>
        <form action="store.php?page=store" method="GET">
            <div class="store-catagory">
                <select name="category">
                    <option value="">All categories</option>
                    <option value="action">Action</option>
                    <option value="adventure">Adventure</option>
                    <option value="rpg">Role-playing</option>
                    <option value="fps">First-person shooter</option>
                    <option value="strategy">Strategy</option>
                </select>
                <select name="sort">
                    <option value="ASC">Price: Low to High</option>
                    <option value="DESC">Price: High to Low</option>
                </select>
            </div>
            <div class="store-sort">
                <input type="text" name="search-query" placeholder="Search games...">
                <button type="submit">Search</button>
            </div>
        </form>
    </div>

    <body class="games">
        <div class="middle-game">
    ';

    if (isset($_GET["search-query"])) {
        $searchQuery = $_GET["search-query"] ?? "";
        searchGame($searchQuery);
    } else if (isset($_GET["category"]) || isset($_GET["sort"])) {
        $category = $_GET["category"] ?? "";
        $sort = $_GET["sort"] ?? "";
        fetchGame($category, $sort, null);
    } else {
        fetchGame(null, null, null);
    }

    echo '
        </div>
    </body>
    ';
} else {
    $gameID = $_GET["g"];
    $gameInfo = fetchGame(null, null, $gameID);
    $user = fetchUser($gameInfo["fromUser"]);
    echo '
    <style>
        .gameID-page {
            height: 100vh;
            background-color: #1b2838;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .imageInfo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            width: 80vw;
            height: 70vh;
            background-color: rgb(23, 26, 33);
        }

        .image {
            width: 400px;
            height: 180px;
            background-color: #ccc;
            margin-right: 20px;
            background-image: url("' . $gameInfo["path"] . '");
            background-size: cover;
        }

        .game-info {
            color: white;
            font-size: 13px;
            font-weight: bold;
            width: 400px;
            height: 180px;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .price-game {
            width: 200px;
            height: 40px;
            background-color: #d2efa9;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .comments-section {
            margin-top: 30px;
        }

        .comment {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment .username {
            font-weight: bold;
        }

        .comment .timestamp {
            font-size: 12px;
            color: #777777;
        }

        .commentTextarea{
            color: black;
        }


    </style>
    <div class="gameID-page">
        <div class="imageInfo-container">
            <div class="image"></div>
            <div class="game-info">
                <p class="##">' . $gameInfo["description"] . '</p>
                <br>
                <p class="##">Upload date: ' . $gameInfo["date"] . '</p>
                <p> Uploaded by: ' . $user["username"] . '</p>
            </div>
        </div>

        <form action="includes/processLibrary.inc.php?g=' . $_GET["g"] . '" method="POST">
            <div class="price-game">
                <p>' . $gameInfo["price"] . '</p>
                <button type="submit" class="addToLibrary">Add to library</button>
            </div>';

    if (isset($_GET["message"])) {
        echo '<p>' . $_GET["message"] . '</p>';
    }

    echo '</form>';

    // Fetch comments for the game
    $statement = $pdo->prepare("SELECT * FROM gameComments WHERE gameid = :gameID ORDER BY unixTimestamp DESC");
    $statement->bindParam(":gameID", $gameID);
    $statement->execute();

    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '
    <div class="comments-section">
        <h2>Comments</h2>';

    foreach ($comments as $comment) {
        $username = $user["username"];
        $timestamp = $comment["unixTimestamp"];
        $formattedTimestamp = formatTimestamp($timestamp);
        $commentText = $comment["comment"];

        echo '
        <div class="comment">
            <p class="username">' . $username . '</p>
            <p class="timestamp">' . $formattedTimestamp . '</p>
            <p class="comment-text">' . $commentText . '</p>
        </div>';
    }

    echo '</div>';

    // Comment form
    echo '
    <form action="includes/addComment.inc.php?g=' . $_GET["g"] . '" method="POST">
        <textarea class="commentTextarea" name="comment" rows="3" placeholder="Add a comment"></textarea>
        <button type="submit">Submit</button>
    </form>';

    echo '</div>';
}

?>'

