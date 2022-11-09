<?php
session_start();

include 'connection.php';
if(isset($_POST["new_post"]))
{
$userid=$_REQUEST["userid"];
// echo $userid;
$title = $_POST["title"];
$content=$_POST["content"];
$sql1 = "INSERT INTO blogtable(title,content,userid) values ('$title','$content','$userid')";
$result1 = mysqli_query($conn, $sql1);
if($result1) {  
    // echo "hello";
}
}
header("Location:userdashboard.php");
?>