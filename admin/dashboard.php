<?php
session_start();
include('../config/database.php');

if(!isset($_SESSION['admin']))
{
header("Location: login.php");
exit;
}

$query="SELECT COUNT(*) as total FROM employees";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$total_employees=$row['total'];
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/admin.css">

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">Admin Dashboard</h2>

<hr>

<div class="row">

<div class="col-md-4">

<div class="card shadow-sm text-center p-4">

<h3 class="display-6"><?php echo $total_employees; ?></h3>

<p class="text-muted">Total Employees</p>

</div>

</div>

</div>

<br>

<div class="mt-4">

<a href="employees.php" class="btn btn-primary me-2">Manage Employees</a>

<a href="add_employee.php" class="btn btn-success me-2">Add Employee</a>

<a href="company_settings.php" class="btn btn-warning me-2">Company Settings</a>

<a href="logout.php" class="btn btn-danger">Logout</a>

</div>

</div>

</body>

</html>