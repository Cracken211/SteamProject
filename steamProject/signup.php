<?php
include("header.php");

?>

<body>
    <div class="login-bodyContainer">
        <div class="loginBox">
            <form action="includes/signup.inc.php" method="POST">
                <label for="username">Sign Up</label>
                <input type="text" placeholder="username" name="uid" required="True" maxlength="20">
                <input type="text" placeholder="email" name="email" required="True">
                <input type="password" placeholder="password" name="pass" required="true" maxlength="30">
                <input type="password" placeholder="repeat password" name="passrepeat" required="true" maxlength="30">

                <input type="submit" name="submit" value="SIGN UP">

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