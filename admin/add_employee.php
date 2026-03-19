<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include('../config/database.php');

if(isset($_POST['save']))
{

$name=$_POST['name'];
$position=$_POST['position'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$company=$_POST['company'];
$address=$_POST['address'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$query="INSERT INTO employees(name,position,phone,email,company,address,username,password)
VALUES('$name','$position','$phone','$email','$company','$address','$username','$password')";

$result=mysqli_query($conn,$query);

if(!$result){
die("SQL Error: ".mysqli_error($conn));
}

$employee_id = mysqli_insert_id($conn);

include('../qr/phpqrcode/qrlib.php');

$profile_url = "http://192.168.0.102/business_card/card/profile.php?id=".$employee_id;

$folder="../qr/codes/";

if(!file_exists($folder)){
mkdir($folder,0777,true);
}

$file_path = $folder."employee_".$employee_id.".png";

QRcode::png($profile_url,$file_path);

$update="UPDATE employees SET qr_code='$file_path' WHERE id='$employee_id'";
mysqli_query($conn,$update);

echo "<h3>Employee Added & QR Generated</h3>";

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Employee</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<div class="container form-container">

<h2>Add Employee</h2>

<form method="POST">

<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="name" required>
</div>

<div class="form-group">
<label>Position</label>
<input class="form-control" type="text" name="position" required>
</div>

<div class="form-group">
<label>Phone</label>
<input class="form-control" type="text" name="phone" required>
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="email" name="email">
</div>

<div class="form-group">
<label>Company</label>
<input class="form-control" type="text" name="company">
</div>

<div class="form-group">
<label>Address</label>
<textarea class="form-control" name="address"></textarea>
</div>

<div class="form-group">
<label>Username</label>
<input class="form-control" type="text" name="username">
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password">
</div>

<button class="btn btn-success" type="submit" name="save">Save Employee</button>

<a class="btn btn-secondary" href="employees.php">Back</a>

</form>

</div>

</body>

</html>