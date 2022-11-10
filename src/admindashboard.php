<?php
session_start(); 
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
<!-- navbar start-->
<body>
<nav class="navbar navbar-expand-lg navbar-light nav1" >
  <a class="navbar-brand" href="home.php"  style="color:#fff;">Home</a>
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
      <li class="nav-item">
        <a class="nav-link" href="userdashboard.php"><span class="dash1">User Dashboard</span></a>
      </li>
    </ul>
  </div>
</nav>
<!-- navbar end -->
<br>

<div class="container">
<h4 class="text-center">Create Your Blog Here</h4>
<h3 class="admin text-center" style="color:#17a2b8">Admin Dashboard</h3> 
</div>
<?php
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "registeration";
// mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password =$_POST["password"];
$sql = "SELECT id,name,email,status FROM registertable";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {

    echo "<table border='1px' style='margin:auto;width:80%;background:#f3fdff;position:relative;bottom:118px;'>";
    echo "<h3 class='text-center mt-5 fw-bold'>USER REQUEST APPROVAL</h3>";
    echo "<th>Id</th><th>Name</th><th>Email</th><th>Status</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["id"]. "  </td><td>". $row["name"].  "</td><td>" . $row["email"] . "</td><td><a href='update.php?id=".$row["id"]."''>" . $row["status"] . "</a></td></tr><br>";
    }
  
} else {
    echo "0 results";
}
?>
<!-- editing data -->
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
<!-- fetching data from blog table -->
<?php 
$sql2 = "SELECT id,title,content,userid,uname  FROM blogtable";
$result2 = mysqli_query($conn, $sql2); ?>
<?php 
if ($result2->num_rows > 0) {
 
    echo "<table border='1px' style='margin:auto;width:80%;background:#f3fdff;margin-top:20px;'>";
    echo "<h3 class='text-center mt-5 fw-bold'>BLOGS  POSTED BY USERS </h3>";
  
   while($row = $result2->fetch_assoc()) { ?>
    <div class="row">
    <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="card-columns-fluid">
  <div class="card" style="width: 30rem;background-color:#17a2b8;color:#fff;margin:auto;">
  <div class="card-body">
    <h4 class="card-text"><span class="blog-title">Blog Posted By- </span> <?php echo $row["uname"];?></h4>
    <h5 class="card-title"><span class="blog-title">Blog title- </span><?php echo $row["title"];?></h5>
    <p class="card-text"><span class="blog-title">Blog Content- </span><?php echo $row["content"];?></p>
  <?php  echo "<a href='deleteadminblog.php?id=".$row['id']."' ><span style='background:#198754;text-decoration:none;color:#fff;padding:10px;'>Delete</span></a>" ?>
  </div>
  </div>
  </div>
   </div>
   </div>
<?php echo "<br>"; ?>
   <?php } ?>
<?php } ?>



</body>
</html>

