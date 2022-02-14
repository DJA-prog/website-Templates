<?php
  session_start();
  require "./includes/dbh.inc.php";
  $server  = $_SERVER['SERVER_ADDR'].':84';
  if (isset($_SESSION['WRITERname'])) {$user = $_SESSION['WRITERname'];}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/contacts.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/HMF.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/links.css">
    <link rel="stylesheet" href="./css/manage.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="icon" href="./img/writer_icon.png">
    <script src="./scripts/main.js" charset="utf-8"></script>
    <title>MY Writer</title>
  </head>

  <body>
    <header>
      <div class="header">
        <div class="Logo">
          <?php echo '<img src="/img/writer_icon.png">'; ?>
        </div>

        <div class="navbar">
          <div id="narrow">
            <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()">Menu</button>
            <div class="dropdown-content" id="myDropdown">
              <?php echo '<a href="/index.php">Home</a>'; ?>
              <a href="contacts.php">Contact</a>
              <?php
                if (isset($user)) {
                  if ($user == 'Admin') {
                    echo '<a href="/profiles/'.$user.'/manage.php">Manage</a>';
                  }
                  echo '
                    <a href="./workspace/Workspace.php">Workspace</a>
                    <a href="./profile.php">Profile</a>
                   ';
                 }
              ?>
            </div>
            </div>
          </div>

          <div id="broad">
            <?php echo '<a href="/index.php">Home</a>'; ?>
            <a href="contacts.php">Contact</a>
            <?php
              if (isset($user)) {
                if ($user == 'Admin') {
                  echo '<a href="/profiles/'.$user.'/manage.php">Manage</a>';
                }
                echo '
                  <a href="./workspace/workspace.php">Workspace</a>
                  <a href="./profile.php">Profile</a>
                 ';
               }
            ?>
          </div>
        </div>

        <div class="Profile">
          <div class="Username">
            <?php
            if (isset($_SESSION['WRITERname'])) {
              echo '<p>User: '.$_SESSION['WRITERname'].'</p>';

            }else{
              echo "<p>User: Guest</p>";
            }
             ?>
          </div>
          <div class="Profile_image">
            <?php
            if (isset($_SESSION['WRITERname'])) {
              $query = "SELECT profile_img FROM users WHERE username='$user';";
              $result = mysqli_query($conn, $query);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $profile_img = $row['profile_img'];
                  echo '<img src="/img/profile_img/'.$profile_img.'" id="Profile_image" onclick="logout()" style="cursor:pointer;">';
                }
              }else {
                echo $query;
              }
            }else {
              echo '<img src="/img/profile_img/guest_icon.png" id="Profile_image" onclick="login_register()" style="cursor:pointer;">';
            }
             ?>
          </div>
        </div>
      </div>
    </header>

    <div id="logout">
      <span onclick="logout_close()">&times;</span>
      <div class="Username" style="text-align:center;">
        <?php echo '<p>Do you want to logout from:</P><br><p> '.$_SESSION['WRITERname'].'</p>';?>
      </div>
      <?php echo '<form action="/includes/logout.inc.php" method="post" style="text-align:center;">'; ?>
        <button type="submit" name="login-submit" style="cursor:pointer;" class="logout">Logout</button>
      </form>
    </div>

     <div class="login_register" id="login_register">
       <div class="background">
         <div class="center">
           <div class="Login">
             <span onclick="login_register_close()">&times;</span>
             <h1>Login</h1>
             <form class="login" action="./includes/login.inc.php" method="post">
               <?php if (isset($_GET["mailuid"])) {
                 echo '<input type="text" name="mailuid" value="'.$_GET["mailuid"].'"></br>';
               }else {
                 echo '<input type="text" name="mailuid" placeholder="E-mail/Username"></br>';
               } ?>
               <input type="password" name="pwd" placeholder="Password"></br>
               <button type="submit" name="login-submit">Login</button>
             </form>
           </div>

           <div class="Register">
             <span onclick="login_register_close()">&times;</span>
             <h1>Signup</h1>
             <?php
             // Here we create an error message if the user made an error trying to sign up.
             if (isset($_GET["errorregister"])) {
               if ($_GET["errorregister"] == "emptyfields") {
                 echo '<p class="signuperror">Fill in all fields!</p>';
               }
               else if ($_GET["errorregister"] == "invaliduidmail") {
                 echo '<p class="signuperror">Invalid username and e-mail!</p>';
               }
               else if ($_GET["errorregister"] == "invaliduid") {
                 echo '<p class="signuperror">Invalid username!</p>';
               }
               else if ($_GET["errorregister"] == "invalidmail") {
                 echo '<p class="signuperror">Invalid e-mail!</p>';
               }
               else if ($_GET["errorregister"] == "passwordcheck") {
                 echo '<p class="signuperror">Your passwords do not match!</p>';
               }
               else if ($_GET["errorregister"] == "usertaken") {
                 echo '<p class="signuperror">Username is already taken!</p>';
               }
             }
             // Here we create a success message if the new user was created.
             else if (isset($_GET["signup"])) {
               if ($_GET["signup"] == "success") {
                 echo '<p class="signupsuccess">Signup successful!</p>';
               }
             }
             ?>
             <form class="form-signup" action="./includes/signup.inc.php" method="post">
               <?php
               // Here we check if the user already tried submitting data.

               // We check username.
               if (!empty($_GET["username"])) {
                 echo '<input type="text" name="username" placeholder="Username" value="'.$_GET["username"].'"><br>';
               }
               else {
                 echo '<input type="text" name="username" placeholder="Username" required><br>';
               }
               // We check full name.
               if (!empty($_GET["fname"])) {
                 echo '<input type="text" name="Fname" placeholder="Full Name" value="'.$_GET["fname"].'"><br>';
               }
               else {
                 echo '<input type="text" name="Fname" placeholder="Full Name" required><br>';
               }
               // We check surname.
               if (!empty($_GET["surname"])) {
                 echo '<input type="text" name="Lname" placeholder="Surname" value="'.$_GET["surname"].'"><br>';
               }
               else {
                 echo '<input type="text" name="Lname" placeholder="Surname" required><br>';
               }
               // We check e-mail.
               if (!empty($_GET["mail"])) {
                 echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'"><br>';
               }
               else {
                 echo '<input type="text" name="mail" placeholder="E-mail" required><br>';
               }
               // We check cell.
               if (!empty($_GET["cell"])) {
                 echo '<input type="text" name="cell" placeholder="Cell (Optional)" value="'.$_GET["cell"].'"><br>';
               }
               else {
                 echo '<input type="text" name="cell" placeholder="Cell (Optional)"><br>';
               }
               ?>
               <input type="password" name="pwd" placeholder="Password" required><br>
               <input type="password" name="pwd-repeat" placeholder="Repeat password" required><br>
               <button type="submit" name="signup-submit">Register</button>
             </form>
           </section>
           </div>
         </div>
       </div>
     </div>
