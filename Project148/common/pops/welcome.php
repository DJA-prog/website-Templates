<?php
  if($_SESSION['TP_welcomed'] == false){
    echo '<div class="pop_welcome">
      <div class="pop_message">
        <h3>Welcome, '.$_SESSION['TP_username'].'</h3>
      </div>
    </div>

    <style media="screen">
      .pop_welcome{
        width: 100%;
        position: fixed;
        animation: fadeOut 2s forwards;
        animation-delay: 3s;
        background: green;
        padding: 10px 0;
        text-align: center;
      }
      .pop_welcome .pop_message{
        align-content: center;
        color: white;
      }

      @keyframes fadeOut {
          from {opacity: 1;}
          to {opacity: 0;}
      }
      @media only screen and (min-width: 1000px) {
        .pop_welcome{
          left: calc(25%);
          width: 50%;
        }
      }
    </style>';

    $_SESSION['TP_welcomed'] = true;
  }

 ?>
