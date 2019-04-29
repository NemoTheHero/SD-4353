<<?php
session_start(); // start session
?>

<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axel Server</title>
    <link href="styleindex.css" rel="stylesheet">
</head>
<!-- Using a header file to split the top part of the CODE to be more organized -->

<body>

    <header>

        <!-- Check to see if there is a session logged in, if so show them the logout button-->
<?php
  if(isset($_SESSION['userId']))
  {
    /*echo 
    '<form action="includes/logout.in.php" method="post">
                <ul class="main-button">
                <li><a class="logoutform"><input type="submit" name="logout-submit" value="LOGOUT"></a></li>
                </ul>
            </div>
    </form>';*/

    echo 
    '<div class="row">
    <div class="logo"> <img src="image/Axel.png" </div> 
        <ul class="main-nav">
        <li class="active"><a href="logindex.php"> HOME </a></li>
        <li><a href="client-profile.php"> PROFILE </a></li>
        <li><a href=""> SERVICES </a></li>
        <li><a href="about.php"> ABOUT </a></li>
        <li><a href="includes/logout.in.php"> LOGOUT </a></li>
        </ul>

    </div>
</div>';

  }
?>


<!-- variables for users and such using session-->
<div class="row">
<div class="hero">
<!-- Changing content on the website-->
 
  <?php
  if(isset($_SESSION['userId']))
  {

    echo "<span class='login-status'>" ."Welcome " . $_SESSION["currentUser"] . "</span>";
    
    echo '<h1> What would you like to do? </h1> 
    <div class="button">
         <a href="fuelquote.php" class="btn btn-one"> Fuel Quote</a>
         <a href="tran-history.php" class="btn btn-two"> Fuel History </a>
    </div>';
   
  }
  else 
  {

  }
  ?>

</div>
</div>

<!-- Main body of the backend code  -->
<main>
</main>


</body>
</html>