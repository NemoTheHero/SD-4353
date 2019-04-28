<!-- PHP sign up script-->
<?php

// Check to see if the user clicked the sign up button
// Then send data into the database using the script
if (isset($_POST['signup-submit'])) 
{
   // Require the config for the database to gain access
   require 'db.in.php'; 

   // Setting all the variables from the POST method to fetch it into the databse
   $username = $_POST['uid'];
   $email = $_POST['uemail'];
   $password = $_POST['upwd'];

   // Error handlers to make sure all the input is right
   if (empty($username) || empty($email) || empty($password)) 
   {
      // Send user back to the same page if there is an error
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
      exit(); // Terminating the script if there is an error to prevent other codes from executing
   }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username) ) // make sure to check for the 2 cases below first
   {
      header("Location: ../signup.php?error=invalidemailuid&uid="); // Send nothing back because both are wrong
      exit();
   }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) // Validate to make sure that the email is right
   {
      header("Location: ../signup.php?error=invalidemail&uid=".$username);
      exit();
   }
   else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)) // validate the username
   {
      header("Location: ../signup.php?error=invalidusername&uemail=".$email);
      exit();
   }
   else 
   {
      // Using this statement to check for any username that already exist in the database
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; // ? is a placeholder
      // This statement is to connect to the database php
      $stmt = mysqli_stmt_init($conn); // Initializing the statment in mysql
      // if statement to check for error handling. If statement fail send them back to the sign up page
      if (!mysqli_stmt_prepare($stmt,$sql)) 
      {
         header("Location: ../signup.php?error=sqlstmterror");
         exit();
      }
      // if there are no error continue our script and put the information inside our db
      else 
      {  // passing string from the statement to indicate what kind of data we are passing s = string i= int
         mysqli_stmt_bind_param($stmt,"s",$username ); // Take info from user to send to db using our statement
         mysqli_stmt_execute($stmt); // Execute the statement and run it inside our db to see if there is a match
         mysqli_stmt_store_result($stmt); // Store the result of what we found into the statement again
         $resultCheck = mysqli_stmt_num_rows($stmt); // Check how many rows of result. Basically how many entries with the same name. 

         // Checking result now to make sure the username is valid
         // If the number of rows is more than 0 that means 1 or more users have the same username already
         if ($resultCheck > 0) 
         {
            header("Location: ../signup.php?error=UserNameTaken&uemail=".$email);
            exit();
         }
         // Else sign up the user into the data using prepare statements
         else 
         {
            // Inserting data into the db (?) = placeholders
            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn); // Connect to database by initializing 
            if (!mysqli_stmt_prepare($stmt,$sql)) // Same error handling
            {
               header("Location: ../signup.php?error=sqlstmterror");
               exit();
            }
            else
            {
               // Hashing the password
               $hashedPwd = password_hash($password, PASSWORD_DEFAULT) ;

               mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd); // Take info from user to send to db using our statement
               mysqli_stmt_execute($stmt); // Execute the statement and run it inside our db to see if there is a match
               mysqli_stmt_store_result($stmt); // Store the result of what we found into the statement again
               // If everything work then successfully registered
               header("Location: ../login.php?registeration=SUCCESS");
               exit();
            }
         }
      }

   }
   
          
   mysqli_stmt_close($stmt); // Closing statment 
   mysqli_close($conn); // Closing connection

}

// Sending user back to the signup page if arrive by accident
else
{
   header("Location: ../signup.php");
   exit();

}