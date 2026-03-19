<?php

session_start();
include('../config/database.php');

if(!isset($_SESSION['employee']))
{
header("Location: login.php");
exit;
}

$id = $_SESSION['employee'];

$query = "SELECT * FROM employees WHERE id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$update="UPDATE employees 
SET name='$name', phone='$phone', email='$email'
WHERE id='$id'";

mysqli_query($conn,$update);

echo "Profile Updated";

header("refresh:1;url=dashboard.php");

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Profile</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/employee.css">

</head>

<body>

<div class="container form-container">

<h2>Edit My Profile</h2>

<form method="POST">

<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
</div>

<div class="form-group">
<label>Phone</label>
<input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>">
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>">
</div>

<button class="btn btn-primary" name="update">Update</button>

<a class="btn btn-secondary" href="dashboard.php">Back</a>

</form>

</div>

</body>

</html>