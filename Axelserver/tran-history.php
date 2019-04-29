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
    background-color: #DAA520;
    color: white;
    text-align: center;
    height:60px;
    border-width: 5px;
    border-color: 	#DAA520;
    border-style: solid;
    height:20%;
    }
  tr:nth-child(even) {background-color: transparent}
 </style>
</head>

<body>

 <table>
 <?php

$sql_history = "SELECT * FROM fuelquote WHERE client_username ='$currentID'";
$result_history = mysqli_query($conn, $sql_history);
$resultCheck = mysqli_num_rows($result_history);

if ($resultCheck > 0) 
{

  echo '

    <h1> Transaction History</h1>

    <tr>
    <th>Gallons Purchased</th> 
    <th>Total Price</th> 
    <th>Date of Purchase</th>
    </tr>
    
    ';


  while($row = $row = $result_history->fetch_assoc()) 
  {
  

    echo "<tr><td>" . $row["gallons_requested"]. " Gallons </td><td> $" . 
    $row["purchase_price"] ."</td><td>"
    .$row["date_purchased"]. "</td></tr>";

  }
}

else { 

  echo "<h1 style='color: #DEB887; font-size: 37px; margin-top: 12%;' > User does not have an existing purchase history </h1>"; 

}


?>
</table>
</body>
</html>

