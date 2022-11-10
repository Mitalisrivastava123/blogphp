<?php
include 'connection.php';


$id=$_REQUEST["id"];
$title=$_REQUEST["title"];
$content=$_REQUEST["content"];
echo $id ;

$sql ="UPDATE blogtable set title='".$title."',
content='".$content."'
where id='".$id."'";
$result=$conn->query($sql);
if ($result == TRUE)
{

}
header("Location:userdashboard.php");

?>
