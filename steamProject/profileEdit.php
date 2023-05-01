<?php
require_once("./includes/functions.inc.php");
require_once("header.php");

?>


<div class="profileEdit-container">
  <h1>Edit Profile</h1>
  <form action="includes/profileEdit.inc.php" method="POST" enctype="multipart/form-data">

    <label for="avatar">Profile Picture</label>
    <input type="file" id="avatar" name="avatar" class="profileEdit-avatar">

    <label for="color">Choose a Gradient</label>
    <select id="color" name="theme" class="profileEdit-color">
      <option value="red">Red</option>
      <option value="green">Green</option>
      <option value="blue">Blue</option>
      <option value="black">Black</option>
      <option value="purple">Purple</option>
      <option value="pink">Pink</option>
    </select>

    <button type="submit" class="profileEdit-submit">Save Changes</button>
  </form>
</div>