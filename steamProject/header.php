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
            if (isset($_SESSION["uid"])) { // checks session id for later decision in displayed buttons. For example if use is set log out pops up rather than login
                if (isset($_GET["message"]) && $_GET["message"] === "profile") {
                    echo '<a href="profileEdit.php?page=edit">Edit Profile</a>';
                } else {
                    echo '<a href="profile.php?page=profile">Profile</a>';
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
                    <p> Beam LLC </p>
                </a>
            </form>

            <form class="links-logo" action="" method="POST">
                <a href="store.php?page=store">Store</a>
                <a href="community.php?page=community">Community</a>
                <a href="library.php?page=library">library</a>
                <a href="support.php?page=support">Support</a>
                <?php
                if (isset($_GET["page"]) && $_GET["page"] == "store") // echos upload game button if page = store
                    echo "<a href='upload.php' class='upload'>Upload Game!</a>"
                        ?>
                </form>

            </div>
        </div>
    </header>