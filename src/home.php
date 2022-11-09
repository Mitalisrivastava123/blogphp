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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h3>Blogs BY User or Admin</h3>
<?php

$sql2 = "SELECT id,title,content  FROM blogtable";
$result2 = mysqli_query($conn, $sql2); 
if ($result2->num_rows > 0) {
    echo "<table border='1px'>";
    echo "<th>Id</th><th>Title</th><th>Content</th>";
   while($row = $result2->fetch_assoc()) {
    
    echo "<tr></td><td>". $row["id"]. "  </td><td>". $row["title"].  "</td><td>" . $row["content"] . "</td><td><a class='btn btn-info' href='userdashboard.php?id=".$row["id"]."'>edit</a></td><td><a href='delete.php?id=".$row['id']."' >Delete</a></td>";
    }
}
?>
</body>
</html>