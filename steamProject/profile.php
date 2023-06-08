<?php
require("includes/functions.inc.php");
require_once("backgrounds.php");
include("header.php");

checkSession($_SESSION["uid"]);



// $theme = fetchTheme($_SESSION["uid"]);

// echo "<style> body{
//         background: $theme[0];
//         background: linear-gradient(150deg, rgba($theme[0]) 3%, rgba($theme[1]) 41%, rgba($theme[2]) 100%);
//     }";


?>


<body>



    <div class="background-container-profile">
        <?php
        $theme = fetchTheme($_SESSION["uid"]); // Grabs session id and searches database for the theme of the user 
        echo implode(",", $backgrounds[$theme]); 

        ?>
    </div>
</body>