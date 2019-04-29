<!-- requires the top part of the code-->
<?php
require "header.php";
?>

<!-- variables for users and such using session-->
<div class="row">
<div class="hero">
<!-- Changing content on the website-->
 
  <?php
  if(isset($_SESSION['userId']))
  {

    echo "<span class='login-status'>" ."Welcome " . $_SESSION["currentUser"] . "</span>";
   

   
  }
  else 
  {
    echo '<h1> Engineered to last
          </h1>
    <div class="button">
         <a href="login.php" class="btn btn-one"> Login!</a>
         <a href="signup.php" class="btn btn-two"> Register!</a>
    </div>';
  }
?>
</div>
</div>

<!-- Main body of the backend code  -->
<main>


</main>


<!-- requires the botom part of the code-->
<?php
require "footer.php";
?> 