<div class="login_register" id="login_register">
  <div class="background">
    <div class="center">
      <div class="Login">
        <span onclick="login_register_close()">&times;</span>
        <h1>Login</h1>
        <form class="login" action="./includes/login.inc.php" method="post">
          <?php if (isset($_GET["errorlogin"])) {
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
