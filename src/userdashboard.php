<?php
session_start();

$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "registeration";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if(isset($_GET["id"]))
{
$id= $_REQUEST["id"];
$sql = "SELECT * FROM blogtable WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  $id1= $row["id"];
  $title1=$row["title"];
  $content1=$row["content"];
    }
}
}
?>
<?php
$email = $_POST["email"];
$password =$_POST["password"];
$sql = "SELECT id,name,email,status  FROM registertable WHERE email = '$email' and password='$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $_SESSION["id"]=$row["id"];
     $_SESSION["name"]= $row["name"];
    
      
     if($row["status"] == "requested")
     {
        echo "<script>
		alert('Your Request is pending Kindly wait for approval');
		window.location.href='userregister1.php';
	   </script>";   
     }
     else
     {
        echo '<script>alert("your status was approved")</script>';
     }
    }
}
$idsession= $_SESSION["id"];
$namesession= $_SESSION["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light nav1">

  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admindashboard.php"><span class="dash1">Admin Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userregister1.php"><span class="dash1">User Login Page</span></a>
      </li>
    </ul>
  </div>
</nav>
<br>
    <div class="container">
<?php if(isset($_POST["new_post"])){?>
    <div class="alert alert-primary" role="alert">
    Post has been successfully added 
<?php } ?>
</div>
</div>
</div>
<?php
?> 
<div class="container">
<h4 class="text-center">Create Your Blog Here</h4>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $title1;?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" name="content" value="<?php echo $content1;?>" id="exampleFormControlTextarea1" rows="3"><?php echo $content1;?>
  </textarea>
  </div>
  <button type="submit" name="new_post" class="btn btn-primary">Submit</button>
  <button type="submit" name="update" class="btn btn-info">update</button>
</form>
</div>
 <br>
<?php
$sqlqu = "SELECT id,name  FROM registertable WHERE email = '$email' and password='$password'";
$resultset = mysqli_query($conn, $sqlqu);
if ($resultset->num_rows > 0) {
  while($row = $resultset->fetch_assoc()) {
  $idone= $row["id"];
  // echo $idone;
  $name=$row["name"];
    }
}
if(isset($_POST["new_post"]))
{
$title = $_POST["title"];
$content=$_POST["content"];
$sql1 = "INSERT INTO blogtable(title,content,userid,uname) values ('$title','$content','$idsession','$namesession')";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_query($conn, $sql)) {  
}
}
// update section
if(isset($_POST["update"]))
{
$title = $_POST["title"];
$content=$_POST["content"];
$sqltwo = "UPDATE blogtable set title='".$title."',
content='".$content."'
where id='".$id."'";
$result1 = mysqli_query($conn, $sqltwo);
if (mysqli_query($conn, $sqltwo)) {  
}
}
?>
<?php 
$sql2 = "SELECT id,title,content,userid,uname  FROM blogtable";
// $sql3= "SELECT name  FROM registertable WHERE id='$id'";

$result2 = mysqli_query($conn, $sql2); ?>
<?php 


if ($result2->num_rows > 0) {
  $nameuser =$row["userid"];
echo $nameuser;
    echo "<table border='1px'>";
    echo "<th>Blog Posted By</th><th>Id</th><th>Title</th><th>Content</th>";
   while($row = $result2->fetch_assoc()) {
    echo "<tr><td>" .$row["uname"]."</td><td>". $row["id"]. "  </td><td>". $row["title"].  "</td><td>" . $row["content"] . "</td><td><a class='btn btn-info' href='userdashboard.php?id=".$row["id"]."'>edit</a></td><td><a href='delete.php?id=".$row['id']."' >Delete</a></td>";
    }

}




?>

</body>
</html>


