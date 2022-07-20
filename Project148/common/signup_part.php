<div class="signup_page">
  <div class="signup_back_blurr">
    <div class="signup_frame">
      <div class="signup_buffer"></div>
      <div class="signup_heading">
        <img src="./img/icons/networking.png" alt="TP">
        <h2>Terminal Point</h2>
      </div>
      <div class="signup_buffer"></div>
      <form class="signup_form" action="./includes/signup.inc.php" method="post">
        <?php
        if(isset($_GET['username'])){
          echo '<input class="login_form_input" type="text" name="username" placeholder="Username" value="'.$_GET['username'].'" required>';
        }else{
          echo '<input class="login_form_input" type="text" name="username" placeholder="Username" required>';
        }
        if(isset($_GET['fname'])){
          echo '<input class="signup_form_input" type="text" name="first_name" placeholder="First name" value="'.$_GET['fname'].'" required>';
        }else{
          echo '<input class="signup_form_input" type="text" name="first_name" placeholder="First name" required>';
        }
        if(isset($_GET['surname'])){
          echo '<input class="signup_form_input" type="text" name="last_name" placeholder="Last name" value="'.$_GET['surname'].'" required>';
        }else{
          echo '<input class="signup_form_input" type="text" name="last_name" placeholder="Last name" required>';
        }
        if(isset($_GET['mail'])){
          echo '<input class="signup_form_input" type="email" name="email" placeholder="Email" value="'.$_GET['mail'].'" required>';
        }else{
          echo '<input class="signup_form_input" type="email" name="email" placeholder="Email" required>';
        }
        ?>
        <input class="signup_form_input" type="password" name="password_1" placeholder="Password" required>
        <input class="signup_form_input" type="password" name="password_2" placeholder="Confirm Password" required>
        <div class="signup_form_buffer"></div>
        <input class="signup_form_button" type="submit" name="submit_signup" value="SIGNUP">
      </form>
      <div class="signup_signin">
        <p>Already have an account? <span><a href="?log=signin">Signin Here</a></span></p>
      </div>
      <div class="signup_buffer"></div>
    </div>
  </div>
</div>
