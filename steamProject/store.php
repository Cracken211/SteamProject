<?php
require_once("./includes/functions.inc.php");
include("header.php");
?>

<div class="store-search" image>
    <form action="store.php?message=store" method="GET">
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

            fetchGame($category, $sort);
        } else {
            fetchGame();
        }

        ?>
    </div>
</body>