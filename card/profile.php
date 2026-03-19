<?php
include('../config/database.php');

$id=$_GET['id'];

$emp_query="SELECT * FROM employees WHERE id='$id'";
$emp_result=mysqli_query($conn,$emp_query);
$emp=mysqli_fetch_assoc($emp_result);

$company_query="SELECT * FROM company LIMIT 1";
$company_result=mysqli_query($conn,$company_query);
$company=mysqli_fetch_assoc($company_result);
?>

<!DOCTYPE html>
<html>
<head>

<title>Digital Card</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f2f2f2">

<div class="container mt-5">

<div class="card p-4 shadow text-center">

<img src="../assets/images/<?php echo $company['logo']; ?>" width="120">

<h3><?php echo $company['company_name']; ?></h3>

<p><?php echo $company['address']; ?></p>

<p><?php echo $company['phone']; ?></p>
<p><?php echo $company['email']; ?></p>

<hr>

<h4><?php echo $emp['name']; ?></h4>

<p><?php echo $emp['position']; ?></p>

<p><b>Phone:</b> <?php echo $emp['phone']; ?></p>

<p><b>Email:</b> <?php echo $emp['email']; ?></p>

<hr>

<a href="tel:<?php echo $emp['phone']; ?>" class="btn btn-success">Call</a>

<a href="https://wa.me/<?php echo $emp['phone']; ?>" class="btn btn-primary">WhatsApp</a>

<a href="save_contact.php?id=<?php echo $emp['id']; ?>" class="btn btn-dark">Save Contact</a>

</div>

</div>

</body>
</html>