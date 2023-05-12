<?php
require_once("./includes/functions.inc.php");
include("header.php");

if (!isset($_GET["g"])) {

    ?>
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
            <?php
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
            ?>
        </div>
    </body>
    <?php


} else {
    $gameID = $_GET["g"];
    $gameInfo = fetchGame(null, null, $gameID);
    $user = fetchUser($gameInfo["fromUser"]);
    echo '<style>

    
    .gameID-page{
        /* width: 100vw; */
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
        background-image: url("'. $gameInfo["path"] .'");
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
        jusify-content: center;
    }

</style>
<div class="gameID-page">

    <div class="imageInfo-container">
        <div class="image"></div>
        <div class="game-info">
        <p class="##">'. $gameInfo["description"] .'</p>
        <br>
        <p class="##">Upload date: '. $gameInfo["date"] .'</p>
        <p> Uploaded by: '. $user["username"] .'</p>
        </div>
    </div>  

    <div class="price-game">
    <p>'. $gameInfo["price"] .'</p>
    </div>        
</div>
';



}
?>

