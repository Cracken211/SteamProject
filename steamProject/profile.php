<?php
require("includes/functions.inc.php");
include("header.php");

checkSession($_SESSION["uid"]);



$theme = fetchTheme($_SESSION["uid"]);

    echo "<style> body{
        background: $theme[0];
        background: linear-gradient(150deg, rgba($theme[0]) 3%, rgba($theme[1]) 41%, rgba($theme[2]) 100%);
    }";
    

?>


<body> 


    <li>
        <a href="/profileEdit.php"></a>
    </li>


</body>



