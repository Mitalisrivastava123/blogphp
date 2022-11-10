<?php
include 'connection.php';
$id = $_REQUEST["id"];
$sql = "UPDATE registertable  SET status='approved' WHERE id = $id";
if (mysqli_query($conn, $sql)) {
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location:admindashboard.php");
?>

<!-- updating data of registertable -->


