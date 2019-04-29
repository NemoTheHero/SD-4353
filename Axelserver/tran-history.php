<?php
require "header.php";
require 'includes/db.in.php';
?>

<?php
 if (!isset($_SESSION)) 
    {
        session_start();
    }
$currentID = $_SESSION['currentUser'];
//echo "<span class='login-status'>" ."Welcome " . $_SESSION["currentUser"] . "</span>";
?>

<!DOCTYPE html>
<html>
<head>

 <h1> Transaction History</h1>
 <style>

  h1{

    font-size: 50px;
    color: white;

    text-transform: uppercase;
    text-align: center;

    margin-top: 50px;
    margin-left: 35px;
    margin-bottom: -150Px;
    }


  title{
      color: white;
  }

  table {
   border-collapse: collapse;
   width: 50%;
   height: 27%; 
   color: white;
   font-family: roboto;
   font-size: 20px;
   text-align: center;
   margin-left: 25%;
   margin-top: 10%;
   border-width: 5px;
   border-color: 	#DAA520;
   border-style: solid;
   background-color: transparent;
   background
    } 
  th {
   background-color: 	#DAA520;
   color: white;
   text-align: center;
    }
  tr:nth-child(even) {background-color: transparent}
 </style>
</head>

<body>

 <table>

 <tr>
  <th>Gallons Purchased</th> 
  <th>Total Price</th> 
  <th>Date of Purchase</th>
 </tr>

 <?php

$sql_transaction = "SELECT * FROM fuelquote WHERE client_username ='$currentID'";
$result = $conn->query($sql_transaction);

if ($result-> num_rows > 0) 
{
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td id=>" . $row["gallons_requested"]. "</td><td>" . $row["purchase_price"] ."</td><td>"
    .$row["date_purchased"]. "</td></tr>";
    
}

//echo "</table>";
//echo "</title>";

} 

else { echo "No History"; }

?>
</table>
</body>
</html>

