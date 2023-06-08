<?php
require_once("./includes/functions.inc.php");
require_once("header.php");

?>


<div class="profileEdit-container">
  <h1>Edit Profile</h1>
  
  // gives users multiple choices, and later redirects to a link with the value for later use
  <form action="includes/profileEdit.inc.php" method="POST" enctype="multipart/form-data">
 
  <?php
  // if(isset($_GET["message"])){
  //   echo  "<p class='message-edit'>" . $_GET["message"] . "</p>" . "<style> .message-edit{ "; 
  // };
  ?>
    <label for="avatar">Profile Picture</label>
    <input type="file" id="avatar" name="avatar" class="profileEdit-avatar">

    <label for="color">Choose a Gradient</label>
    <select id="color" name="theme" class="profileEdit-color">
      <option value="gradient">Gradient</option>
      <option value="ps4">Floating</option>
      <option value="floatingSquares">Floating Cubes</option>
      <option value="particle">Particle</option>
    </select>

    <button type="submit" class="profileEdit-submit">Save Changes</button>
  </form>
</div>