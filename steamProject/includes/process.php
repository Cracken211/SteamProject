<?php
require_once("functions.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  var_dump(fetchUser($_SESSION["uid"]));
}

?>