<!-- PHP login script-->
<?php

// Check to see if the user clicked the sign up button
if (isset($_POST['login-submit']))
{
   // Require the config for the database to gain access
   require 'db.in.php'; 

   // Setting all the variables from the POST method to fetch from the databse
   $uid = $_POST['uid']; // Username
   $password = $_POST['upwd']; // Password

   // if user didnt fill out all the required fields error message for log in
   if (empty($uid) || empty($password)) 
   {
          header("Location: ../login.php?error=emptyfields");
          exit();
   }
   // if not empty find the user in the database and match the information
   else
   {
          // SQL code to find the input in the table
          $sql = "SELECT * FROM users WHERE uidUsers=?;";
          $stmt = mysqli_stmt_init($conn); // statement to initialize the connection

          // Error handling for connection
          if (!mysqli_stmt_prepare($stmt,$sql)) 
          {
               header("Location: ../login.php?error=sqlstmterror");
               exit();
          }
          else 
          {
                    mysqli_stmt_bind_param($stmt,"s", $uid); // Pass in parameters that user gave
                    mysqli_stmt_execute($stmt); // Executing the statement in db
                    $result = mysqli_stmt_get_result($stmt); // get result from the statement in the db. Inserted into variable result

                    // check to see if there are any result
                    if ($row = mysqli_fetch_assoc($result)) 
                    {
                        // verifying password
                        $pwdCheck = password_verify($password, $row['pwdUsers']);
                        if ($pwdCheck == false) // If password does not match then send them back
                        {
                              header("Location: ../login.php?error=wrongpassword");
                              exit();
                        }
                        else if ($pwdCheck == true)  // if the password is true then we pass it
                        {
                              session_start(); // Start session variable
                              // Grabing the user Ids from the db
                              $_SESSION['userId'] = $row['idUsers']; // primary key
                              $_SESSION['userUid'] = $row['uidUsers']; // actual user
                              $_SESSION['currentUser'] = $row['uidUsers']; // A key to get the session of the current user for updating user info

                              // Checking to see if the user logged in for the first time
                              // If the user is first time then make then fill out user form
                              if (!isset($_COOKIE['visited'])) 
                              { // no cookie, so probably the first time here
                                    setcookie ('visited', 'yes', time() + 120); // set visited cookie
                                    header("Location: ../client-profile.php?login=SUCCESS&FirstTime");
                                    exit(); // always use exit after redirect to prevent further loading of the page
                              }

                              else // if not just take them to profile page
                             {
                                    header("Location: ../logindex.php?login=SUCCESS");
                                    exit();
                             }

                        }
                        else // make sure that the password has to be true
                        {
                              header("Location: ../login.php?error=wrongpassword");
                              exit();
                        }
                             
                    }
                    else // if we didnt get anything then there is error message
                    {
                        header("Location: ../login.php?error=nouser");
                        exit();
                    }


          }

   }


}
// If User didnt do so send them back to the index page
else
{
   header("Location: ../index.php");
   exit();
}