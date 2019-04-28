<?php 


if (isset($_POST['get-price']))
{
          require 'db.in.php';
          // Make sure that there is a session, if not start one
          if(!isset($_SESSION)) 
          {
               session_start();
          }

          // Take all the user information from the server and then post a calcualtion 
          $location = $_POST['cLocation'];
          $gallons_requested = $_POST['cGallons'];
          $date_wanted = $_POST['cDate'];
          $currentID = $_SESSION['currentUser'];


          // Finding address of the user and then post it into the form.
          $sql = "SELECT uAddress FROM profiles WHERE currentUser='$currentID'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
          $r_address = $row['uAddress'];

          header("Location:../fuelquote.php?check=SUCCESS");
          exit();



          //echo $row['uAddress'];

          /*

          // Using this statement to check for any username that already exist in the database
          $sql = "SELECT currentUser FROM profiles WHERE currentUser=?"; // ? is a placeholder
          // This statement is to connect to the database php
          $stmt = mysqli_stmt_init($conn); // Initializing the statment in mysql
          // if statement to check for error handling. If statement fail send them back to the sign up page
          if (!mysqli_stmt_prepare($stmt,$sql)) 
          {
                    header("Location: ../fuelquote.php?error=sqlstmterror");
                    exit();
          }

          else
          {
                    mysqli_stmt_bind_param($stmt,"s",$currentID ); // Take info from user to send to db using our statement
                    mysqli_stmt_execute($stmt); // Execute the statement and run it inside our db to see if there is a match
                    mysqli_stmt_store_result($stmt); // Store the result of what we found into the statement again
                    $resultCheck = mysqli_stmt_num_rows($stmt); // Check how many rows of result. Basically how many entries with the same name. 
                    // Checking result now to make sure the username is valid
                    // If the number of rows is more than 0 that means 1 or more users have the same username already
                    if ($resultCheck > 0) 
                    {
                              $sql = "SELECT 'uAddress' FROM 'profiles' WHERE currentUser='$currentID'";
                              $result = mysqli_query($conn,$sql);
                              //mysqli_fetch_assoc($result);
                              //echo "$result";
                              //exit();
                    }
          }
      */









}