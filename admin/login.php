<?php
session_start();
include('../config/database.php');

if(isset($_POST['login']))
{

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
{
$_SESSION['admin']=$username;
header("Location: dashboard.php");
}
else
{
echo "Invalid Login";
}

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">

</head>

<body>

<div class="container" style="max-width:400px;">

<h2 style="text-align:center;">Admin Login</h2>

<form method="POST">

<div class="form-group">
<input class="form-control" type="text" name="username" placeholder="Username">
</div>

<div class="form-group">
<input class="form-control" type="password" name="password" placeholder="Password">
</div>

<button class="btn btn-primary" name="login" style="width:100%;">Login</button>

</form>

</div>

</body>
</html>