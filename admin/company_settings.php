<?php

session_start();
include('../config/database.php');

if(!isset($_SESSION['admin']))
{
header("Location: login.php");
exit;
}

$query="SELECT * FROM company LIMIT 1";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$name=$_POST['company_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$website=$_POST['website'];
$address=$_POST['address'];

$logo_name=$row['logo'];

if(!empty($_FILES['logo']['name']))
{
$logo=$_FILES['logo']['name'];
$tmp=$_FILES['logo']['tmp_name'];

move_uploaded_file($tmp,"../assets/images/".$logo);

$logo_name=$logo;
}

$update="UPDATE company SET
company_name='$name',
phone='$phone',
email='$email',
website='$website',
address='$address',
logo='$logo_name'
WHERE id=".$row['id'];

mysqli_query($conn,$update);

echo "Company Updated Successfully";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Company Settings</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<div class="container form-container">

<h2>Company Settings</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">
<label>Company Name</label>
<input class="form-control" type="text" name="company_name" value="<?php echo $row['company_name']; ?>">
</div>

<div class="form-group">
<label>Phone</label>
<input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>">
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>">
</div>

<div class="form-group">
<label>Website</label>
<input class="form-control" type="text" name="website" value="<?php echo $row['website']; ?>">
</div>

<div class="form-group">
<label>Address</label>
<textarea class="form-control" name="address"><?php echo $row['address']; ?></textarea>
</div>

<div class="form-group">
<label>Company Logo</label>
<input class="form-control" type="file" name="logo">
</div>

<div class="form-group">
<label>Current Logo</label><br>
<img src="../assets/images/<?php echo $row['logo']; ?>" width="120">
</div>

<button class="btn btn-primary" type="submit" name="update">Update Company</button>

<a class="btn btn-secondary" href="dashboard.php">Back</a>

</form>

</div>

</body>

</html>