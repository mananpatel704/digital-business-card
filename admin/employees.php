<?php
session_start();
include('../config/database.php');

if(!isset($_SESSION['admin']))
{
header("Location: login.php");
exit;
}

$query = "SELECT * FROM employees";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
                                                                                                            
<head>

<title>Employee List</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<div class="container">

<h2>Employee List</h2>

<br><br>

<table class="admin-table">

<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
<th>Phone</th>
<th>Email</th>
<th>company</th>
<th>Username</th>
<th>QR Code</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['position']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['username']; ?></td>

<td>

<?php
if(!empty($row['qr_code'])){
?>
<img src="<?php echo $row['qr_code']; ?>" class="qr-small">
<?php
}else{
echo "No QR";
}
?>

</td>

<td>

<a class="btn btn-primary btn-sm" href="../card/profile.php?id=<?php echo $row['id']; ?>">View</a>

<a class="btn btn-success btn-sm" href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a>

<a class="btn btn-danger btn-sm" href="delete_employee.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

<script>

function showPassword(id)
{
var field = document.getElementById("pass"+id);

if(field.type === "password")
{
field.type = "text";
}
else
{
field.type = "password";
}

}

</script>

</body>
</html>