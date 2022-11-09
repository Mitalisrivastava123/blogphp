<?php
session_start(); 
?>
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
    echo "<table border='1px'>";
    echo "<th>Id</th><th>Name</th><th>Email</th><th>Status</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["id"]. "  </td><td>". $row["name"].  "</td><td>" . $row["email"] . "</td><td><a href='update.php?id=".$row["id"]."''>" . $row["status"] . "</a></td></tr><br>";
    }
  
} else {
    echo "0 results";
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

   <h3 class="admin text-center">Admin Panel</h3> 
<br>
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

<h3><a href="userdashboard.php">Go to User Dashboard</a></h3>
</div>
<br>
<?php
if(isset($_POST["new_post"]))
{
$title = $_POST["title"];
$content=$_POST["content"];
$sql1 = "INSERT INTO blogtable(title,content) values ('$title','$content')";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_query($conn, $sql)) {  
}
}
?>
<?php 
$sql2 = "SELECT id,title,content,userid,uname  FROM blogtable";
$result2 = mysqli_query($conn, $sql2); ?>
<?php 
if ($result2->num_rows > 0) {

    echo "<table border='1px'>";
    echo "<th>Id</th><th>Title</th><th>Content</th>";
   while($row = $result2->fetch_assoc()) {
    echo "<tr><td>".$row["uname"]. "  </td><td>". $row["title"].  "</td><td>" . $row["content"] . "</td><td><a class='btn btn-info' href='userdashboard.php?id=".$row["id"]."'>edit</a></td><td><a href='deleteadminblog.php?id=".$row['id']."' >Delete</a></td>";
    }
}
?>


</body>
</html>

