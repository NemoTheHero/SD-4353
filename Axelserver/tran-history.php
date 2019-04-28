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
          $result= mysqli_fetch_assoc($transaction_history);
          

          echo '
          <center> <table border="1" cellspacing="3" cellpadding="3"> 
          <tr> 
              <td> <font face="Roboto">Value1</font> </td> 
              <td> <font face="Roboto">Value2</font> </td> 
              <td> <font face="Roboto">Value3</font> </td> 
              <td> <font face="Roboto">Value4</font> </td> 
              <td> <font face="Roboto">Value5</font> </td> 
          </tr> </center>';


          while ($row = $result->fetch_assoc()) {
                        $field1name = $row["gallons_requested"];
                        $field2name = $row["purchase_price"];
                        $field3name = $row["date_purchased"];
                        $field4name = $row["col4"];
                        $field5name = $row["col5"]; 
                 
                        echo '<tr> 
                                  <td>'.$field1name.'</td> 
                                  <td>'.$field2name.'</td> 
                                  <td>'.$field3name.'</td> 
                                  <td>'.$field4name.'</td> 
                                  <td>'.$field5name.'</td> 
                              </tr>';
                    }
                    $result->free();
                