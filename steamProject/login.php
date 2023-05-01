<?php
require_once("includes/functions.inc.php");
include("header.php");



?>

<body>
    <div class="login-bodyContainer">
        <div class="loginBox">
            <form action="includes/login.inc.php" method="POST">
                <label for="username">Login</label>
                <input class="login-input" type="text" placeholder="email" name="email" required="True">
                <input class="login-input" type="password" placeholder="password" name="pass" required="true" maxlength="30">

                <input class="login-submit" type="submit" name="submit" value="SIGN IN">
                <?php
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                    echo "<p>$message</p>";
                }
                ?>
            </form>
        </div>
    </div>  
</body>