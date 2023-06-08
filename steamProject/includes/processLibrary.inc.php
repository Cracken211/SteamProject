<?php 
require_once("functions.inc.php");


$game = $_GET["g"];
$user = $_SESSION["uid"];
if(!fetchUserLibrary($user, $game)){
    if(addToLibrary($user, $game)){
        header("location: ../store.php?page=store&g=$game&message=Game added to library!");
    } else {
        header("location: ../store.php?page=store&g=$game&message=Failed to add, please try again later.");
    }
} else {
    header("location: ../store.php?page=store&g=$game&message=Game already added to library!");
}


