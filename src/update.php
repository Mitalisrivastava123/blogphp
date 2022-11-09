<?php
include 'connection.php';
$id = $_REQUEST["id"];
// echo $id;
$sql = "UPDATE registertable  SET status='approved' WHERE id = $id";
if (mysqli_query($conn, $sql)) {
//   echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location:admindashboard.php");
?>


