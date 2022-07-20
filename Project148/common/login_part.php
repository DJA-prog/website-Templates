<div class="login_page">
  <div class="login_back_blurr">
    <div class="login_frame">
      <div class="login_buffer"></div>
      <div class="login_heading">
        <img src="./img/icons/networking.png" alt="TP">
        <h2>Terminal Point</h2>
      </div>
      <div class="login_buffer"></div>
      <form class="login_form" action="./includes/login.inc.php" method="post">
        <?php if(isset($_GET['username'])){
          echo '<input class="login_form_input" type="text" name="username" placeholder="Username" value="'.$_GET['username'].'" required>';
        }else{
          echo '<input class="login_form_input" type="text" name="username" placeholder="Username" required>';
        } ?>

        <input class="login_form_input" type="password" name=password placeholder="Password" required>
        <div class="login_form_buffer"></div>
        <input class="login_form_button" type="submit" name="submit_login" value="LOGIN">
      </form>
      <div class="login_signup">
        <p>Don't have an account? <span><a href="?log=signup">Sign up</a></span></p>
      </div>
      <div class="login_buffer"></div>
    </div>
  </div>
</div>
