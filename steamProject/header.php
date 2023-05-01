<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Inspired steam website -->

</head>

<header>
    <div class="headerContainer">

        <form class="login" method="POST">


            <?php
            include_once("./includes/functions.inc.php");
            // checkSession($_SESSION["uid"]);
            if (isset($_SESSION["uid"])) {
                if (isset($_GET["message"]) && $_GET["message"] === "profile") {
                    echo '<a href="profileEdit.php?message=edit">Edit Profile</a>';
                } else {
                    echo '<a href="profile.php?message=profile">Profile</a>';
                }
                echo '<a href="includes/signout.inc.php">Sign out</a>';
            } else {
                echo '<a href="login.php" type="submit" name="page" value="login">login</a>';
                echo '<a href="signup.php" type="submit" name="page" value="signup">signup</a>';
            }

            ?>

        </form>


        <div class="logo">

            <form class="formLogo">
                <a href="index.php" name="page" class="steam-logo-btn">
                    <img src="https://store.cloudflare.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016"
                        alt="Steam logo">
                </a>
            </form>

            <form class="links-logo" action="" method="POST">
                <a href="store.php?message=store">Store</a>
                <a href="community.php?message=community">Community</a>
                <a href="library.php?message=library">library</a>
                <a href="support.php?message=support">Support</a>
                <?php
                if (isset($_GET["message"]) && $_GET["message"] == "store")
                    echo "<a href='upload.php' class='upload'>Upload Game!</a>"
                        ?>
                </form>

            </div>
        </div>
    </header>