<?php require 'header.php'; ?>


  <main>
    <div class="innerMain">

    </div>
  </main>
  <div class="loginWindow">
    <form class="" action="./includes/login.inc.php" method="post">
      <input type="text" name="" placeholder="Username"><br>
      <input type="password" name="" placeholder="Password"><br>
      <div class="loginWindowButtons">
        <div class="BUTTON" onclick="loginClose()">Cancel</div>
        <button class="BUTTON" type="submit" name="login-submit">Login</button>
      </div>
    </form>
  </div>


<?php require 'footer.php'; ?>
