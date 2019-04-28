<!-- Config for the server so it know how to connect into the server-->

<?php
// Setting the variables and name of the host as well as the right database
$servername ="localhost";
$dBUsername ="root";
$dBPassword ="";
$dBName ="axelserver";

// Establish a connection to the database
$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
// Checking whether the connection was successful or not
if(!$conn)
{
          die("Connection Failed: ".mysqli_connect_error());
}