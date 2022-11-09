<?php
include 'connection.php';
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$cpassword = $_POST["cpassword"];
$user_type=$_POST["user_type"];
if($name=="" || $email==""|| $password=="" || $user_type=="" || $cpassword == "")
{
    
    header("Location:index.php");    
}
else
{
if($password == $cpassword)
{
    // database insertion
    $sql="INSERT INTO registertable(name,email,password,user_type,status) values('$name', '$email', '$password','$user_type','requested')";
    if (mysqli_query($conn, $sql)) {  
    echo  "<h3>your process is in request kindly wait</h3>";
    echo "<a href='index.php'>Back to Register Page</a>";
      } 
    else
    {
        echo "password not match";
    }
}
}


?>