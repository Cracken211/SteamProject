<?php
require("functions.inc.php");

if(themeChange($_POST["theme"]) != false){
    header("location: http://localhost:8080/steamProject/profileEdit.php?message=Edit Success");
    echo $_GET["message"];
} else {
    header("location: http://localhost:8080/steamProject/profileEdit.php?message=Edit Failed");
    echo $_GET["message"];
}
?>