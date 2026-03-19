<?php

session_start();
include('../config/database.php');

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);

$query="SELECT * FROM employees WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
$row=mysqli_fetch_assoc($result);

$_SESSION['employee']=$row['id'];

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

<title>Employee Login</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/employee.css">

</head>

<body>

<div class="container" style="max-width:420px;">

<h2 style="text-align:center;">Employee Login</h2>

<form method="POST">

<div class="form-group">
<label>Username</label>
<input class="form-control" type="text" name="username">
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password">
</div>

<button class="btn btn-primary" style="width:100%;" name="login">Login</button>

</form>

</div>

</body>

</html>