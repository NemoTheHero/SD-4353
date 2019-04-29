<?php 
require 'db.in.php';

// Require the config for the database to gain access
//require 'db.in.php';

// If it is user's first time required to fill out everything! 
// Do error handlers to make sure all inputs were correct
// If user clicked on the submit button on the profile page


if (isset($_POST['profile-submit'])) 
{
   if(!isset($_SESSION)) 
   {
      session_start();
   }
   
   // Setting all the variables from the POST method to fetch it into the databse
   // Variables for the POST method to fetch data
          

          $fullname = $_POST['uFullname'];
          $addressOne = $_POST['uAddress1'];
          $addressTwo = $_POST['uAddress2'];
          $city = $_POST['uCity'];
          $zipCode = $_POST['uZip'];
          $state = $_POST['uState'];
          $currentID = $_SESSION['currentUser'];

         $stmt = mysqli_stmt_init($conn);

         // Using this statement to check for any username that already exist in the database
         $check_sql = "SELECT currentUser FROM profiles WHERE currentUser='$currentID'"; 
         $result_sql = mysqli_query($conn, $check_sql);
         $resultCheck = mysqli_fetch_assoc($result_sql);
      

   // Error Handling for Zipcode
   if (strlen($zipCode) > 9 || strlen($zipCode) < 5) 
   {
      // Send user back to the same page if there is an error
      header("Location: ../client-profile.php?error=InvalidZip".$currentID);
      exit(); // Terminating the script if there is an error to prevent other codes from executing
   }

   else if($resultCheck > 0)
   {
      $update_sql = "UPDATE profiles SET uFullname = '$fullname', uAddress = '$addressOne', uAddresstwo = '$addressTwo', 
      uCity = '$city', uZip = '$zipCode', uState='$state' WHERE currentUser = '$currentID'";
      $update_server = mysqli_query($conn,$update_sql);
      header("Location: ../logindex.php?dataInput=SUCCESS");
      exit();

   }
        
    
   else
   {
      // Statements to connect to database
      $sql = "INSERT INTO profiles (currentUser,uFullname,uAddress,uAddresstwo,uCity,uZip,uState) VALUES (?,?,?,?,?,?,?)";
      $stmt = mysqli_stmt_init($conn); // Connect to database by initializing 


      if (!mysqli_stmt_prepare($stmt,$sql)) // Same error handling
         {
            header("Location: ../client-profile.php?error=sqlstmterror");
            exit();
         }

      else
         {
            // Insert all of client information into the profiles table
            mysqli_stmt_bind_param($stmt,"sssssis",$currentID,$fullname,$addressOne,$addressTwo,$city,$zipCode,$state); // Take info from user to send to db using our statement
            mysqli_stmt_execute($stmt); // Execute the statement and run it inside our db to see if there is a match
           
            // If everything work then successfully registered
            header("Location: ../logindex.php?dataInput=SUCCESS");
            $_SESSION['full_name'] = $row['uFullname'];
            exit();
         }
   }
           
  // mysqli_stmt_close($stmt); // Closing statment 
  // mysqli_close($conn); // Closing connection
}


// If it is not user's firstime user can update this 
// Do error handlers to make sure all inputs were correct
