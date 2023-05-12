<?php
require("functions.inc.php");

if(!themeChange($_POST["theme"])){
    header("location: /steamProject/profileEdit.php?message=Edit Success");
} else {
    header("location: /steamProject/profileEdit.php?message=Edit Failed");
}
?>