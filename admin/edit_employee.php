<?php
include('../config/database.php');

$id = $_GET['id'];

$query = "SELECT * FROM employees WHERE id='$id'";
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$name=$_POST['name'];
$position=$_POST['position'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$company=$_POST['company'];
$address=$_POST['address'];
$username=$_POST['username'];

if(!empty($_POST['password']))
{
$password = md5($_POST['password']);

$update="UPDATE employees SET
name='$name',
position='$position',
phone='$phone',
email='$email',
company='$company',
address='$address',
username='$username',
password='$password'
WHERE id='$id'";
}
else
{
$update="UPDATE employees SET
name='$name',
position='$position',
phone='$phone',
email='$email',
company='$company',
address='$address',
username='$username'
WHERE id='$id'";
}

mysqli_query($conn,$update);

/* Redirect back to employee list */
header("Location: employees.php");
exit;

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Employee</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<div class="container form-container">

<h2>Edit Employee</h2>

<form method="POST">

<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
</div>

<div class="form-group">
<label>Position</label>
<input class="form-control" type="text" name="position" value="<?php echo $row['position']; ?>">
</div>

<div class="form-group">
<label>Phone</label>
<input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>">
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>">
</div>

<div class="form-group">
<label>Company</label>
<input class="form-control" type="text" name="company" value="<?php echo $row['company']; ?>">
</div>

<div class="form-group">
<label>Address</label>
<textarea class="form-control" name="address"><?php echo $row['address']; ?></textarea>
</div>

<div class="form-group">
<label>Username</label>
<input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>">
</div>

<div class="form-group">
<label>Password (leave blank if not changing)</label>
<input class="form-control" type="text" name="password">
</div>

<button class="btn btn-primary" name="update">Update</button>

<a class="btn btn-secondary" href="employees.php">Back</a>

</form>

</div>

</body>

</html>