<?php
require_once("./includes/functions.inc.php");
include("header.php");
?>

<div class="store-search" image>
    <form action="search.php" method="GET">
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
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="rating">User Rating</option>
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
        if(!isset($_GET["page"])){
            fetchGame();
        } 
        ?>
    </div>
</body>