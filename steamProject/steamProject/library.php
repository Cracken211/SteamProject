<?php

require_once("includes/functions.inc.php");
include("header.php");

$user = $_SESSION["uid"];

// var_dump($user);

fetchUserLibrary($user, null);


?>