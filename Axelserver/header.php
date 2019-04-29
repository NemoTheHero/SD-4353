<?php
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
    
<?php
// CHECK TO SEE IF THERE IS A SESSOION LOGGED IN, IF THERE IS THEN LOG OUT.
  if(isset($_SESSION['userId']))
  {
    echo 
    '<div class="row">
    <div class="logo"> <img src="image/Axel.png" </div> 
        <ul class="main-nav">
        <li class="active"><a href="logindex.php"> HOME </a></li>
        <li><a href=""> SERVICES </a></li>
        <li><a href="about.php"> ABOUT </a></li>
        <li><a href="includes/logout.in.php"> LOGOUT </a></li>
        </ul>

    </div>
</div>';

  }

  else
  {
      echo '<div class="row">
      <div class="logo"> <img src="image/Axel.png" </div> 
          <ul class="main-nav">
          <li class="active"><a href="index.php"> HOME </a></li>
          <li><a href=""> SERVICES </a></li>
          <li><a href="about.php"> ABOUT </a></li>
          </ul>

      </div>
  </div>';
  }
?>

<!-- Header Class for all pages -->
</header> 