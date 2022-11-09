<?php
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "registeration";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_REQUEST["id"];

$sql = "DELETE  from blogtable WHERE id='$id' ";


if (mysqli_query($conn, $sql)) {
  
    
  } 
  header("Location:userdashboard.php");
 

?>