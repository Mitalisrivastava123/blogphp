<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <li class="nav-item">
      <a class="nav-link" href="index.php"><span class="dash1">User Registration Page</span></a>
    </li>
  </ul>
</div>
</nav>
<p>
    <h3 class="text-center" style="color:#17a2b8;">Blogs BY User or Admin</h3>
<?php 
$sql2 = "SELECT id,title,content,userid,uname  FROM blogtable";
$result2 = mysqli_query($conn, $sql2); ?>
<?php 
if ($result2->num_rows > 0) {
   while($row = $result2->fetch_assoc()) { ?>
   <div class="row">
    <div class="col-md-4"></div>
 <div class="col-md-4">
    <div class="card-columns-fluid">
<div class="card" style="width: 30rem;background-color:#17a2b8;color:#fff;margin:auto;">
  <div class="card-body">
    <h4 class="card-text">Block Posted By-><?php echo $row["uname"];?></h4>
    <h5 class="card-title"><?php echo $row["title"];?></h5>
    <p class="card-text"><?php echo $row["content"];?></p>
  </div>
  </div>
</div>
   </div>
   </div>
   <?php  } ?>
<?php } ?>



</body>
</html>