<?php
if ($user != 'Admin') {
  echo '<div id="delete_profile">
    <label>Delete Profile:</label>
    <form action="./index/delete2.inc.php" method="post">
      <button type="submit" name="login-submit" style="cursor:pointer;" class="logout">Confirm</button>
    </form>
  </div>';
}

 ?>

<div id="personal">
  <form class="site-links" class="upload" action="./index/upload_profile_image2.inc.php" method="post" enctype="multipart/form-data">
    <label>Update Profile image:</label><br>
    <input type="file" name="uploadfile" class="file">
    <button type="submit" name="upload-submit">Change</button>
  </form>
  <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "notpng") {
        echo '<script type="text/javascript">alert("Image file should be in PNG format.");</script>';
      }
      if ($_GET["error"] == "toolarge") {
        echo '<script type="text/javascript">alert("Image file exceed 500000.");</script>';
      }
      if ($_GET["error"] == "notuploaded") {
        echo '<script type="text/javascript">alert("Error during upload.");</script>';
      }
    }
  ?>
  <label>Personal Biography:</label>
  <?php
  require './includes/dbh.inc.php';
  $sql ="SELECT * FROM users WHERE username='".$user."'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      $bio=$row["bio"];
      echo '<div id="profile_bio">
        <p id="profile_bio_sqlireturn">'.$bio.'</p>
        <form id="update_profile_bio" action="./index/updates.php" method="post">
          <textarea name="mybio" spellcheck="true" id="update_profile_bio_textarea">'.$bio.'</textarea><br>
          <button type="submit" name="update-bio">Enter</button>
        </form>
        </div>
        <button onclick="update_bio()" class="profile_bio_button">Update MyBio</button>
      ';
    }
  }
   ?>
</div>

<div id="personalise">
  <label>Cell:</label>
  <?php
  require './includes/dbh.inc.php';
  $sql ="SELECT * FROM users WHERE username='".$user."'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      $cell=$row["cell"];
      echo '<form class="" action="./index/updates.php" method="post">
        <input type="text" name="cell" placeholder="Cell" value="'.$cell.'">
        <button type="submit" name="update-cell">Update</button>
      </form>
      ';
    }
  }
   ?>
   <label for="">Font Size:</label>
   <?php
   require './includes/dbh.inc.php';
   $sql ="SELECT * FROM users WHERE username='".$user."'";
   $result = mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_array($result)){
       $font_size=$row["font_size"];
       echo '<form class="" action="./index/updates.php" method="post">
         <input type="number" min="5" max="100" name="font_size" value="'.$font_size.'">
         <button type="submit" name="update-font_size">Update</button>
       </form>
       ';
     }
   }
    ?>
   <label for="">Line spacing:</label>
   <?php
   require './includes/dbh.inc.php';
   $sql ="SELECT * FROM users WHERE username='".$user."'";
   $result = mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_array($result)){
       $line_space=$row["line_space"];
       echo '<form class="" action="./index/updates.php" method="post">
         <input type="number" min="1" max="100" name="line_space" value="'.$line_space.'">
         <button type="submit" name="update-line_space">Update</button>
       </form>
       ';
     }
   }
    ?>

</div>

<div id="pwd_change">
  <label>Change Password:</label>
  <form class="" action="./index/change_psw.inc.php" method="post">
    <input type="password" name="cpsw" placeholder="Current Password" required><br>
    <input type="password" name="npsw" placeholder="New Password" required><br>
    <input type="password" name="rnpsw" placeholder="Repeat New Password" required><br>
    <button type="submit" name="change-psw">Change</button>
  </form>
</div>
