<?php
require "header.php";
require 'includes/db.in.php';
?>



<?php
 if (!isset($_SESSION)) {
          session_start();
      }


          $currentID = $_SESSION['currentUser'];


          $sql_transaction = "SELECT * FROM fuelquote WHERE client_username ='$currentID'";
          $transaction_history = mysqli_query($conn, $sql_transaction);
          $result= mysqli_num_rows($transaction_history);

          if ($result > 0)
          {
              while($row = mysqli_fetch_assoc($transaction_history))
              {
                  echo $row['gallons_requested'] ."<br<";
              }
          }
          

        