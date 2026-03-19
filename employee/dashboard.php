<?php

session_start();
include('../config/database.php');

if(!isset($_SESSION['employee']))
{
header("Location: login.php");
exit;
}

$id=$_SESSION['employee'];

$query="SELECT * FROM employees WHERE id='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Employee Dashboard</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/employee.css">

<style>

.employee-card{
max-width:500px;
margin:auto;
text-align:center;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.qr-large img{
width:200px;
cursor:pointer;
border:6px solid #f1f1f1;
border-radius:10px;
}

/* Fullscreen QR Modal */

.qr-modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.9);
justify-content:center;
align-items:center;
z-index:999;
}

.qr-modal img{
width:400px;
max-width:90%;
}

.close-btn{
position:absolute;
top:20px;
right:30px;
font-size:40px;
color:white;
cursor:pointer;
}

.employee-actions a{
margin:10px;
}

</style>

</head>

<body>

<div class="container employee-card">

<h2>Employee Dashboard</h2>

<p><strong>Name:</strong> <?php echo $row['name']; ?></p>

<p><strong>Position:</strong> <?php echo $row['position']; ?></p>

<p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>

<br>

<h3>Your QR Code</h3>

<div class="qr-large">

<img src="<?php echo $row['qr_code']; ?>" id="employeeQR" onclick="openQR()">

</div>

<br><br>

<div class="employee-actions">

<a class="btn btn-primary" href="edit_profile.php">Edit Profile</a>

<a class="btn btn-danger" href="logout.php">Logout</a>

</div>

</div>


<!-- Fullscreen QR Popup -->

<div id="qrModal" class="qr-modal">

<span class="close-btn" onclick="closeQR()">×</span>

<img id="qrModalImg">

</div>


<script>

function openQR()
{
var modal=document.getElementById("qrModal");
var img=document.getElementById("employeeQR");
var modalImg=document.getElementById("qrModalImg");

modal.style.display="flex";
modalImg.src=img.src;
}

function closeQR()
{
document.getElementById("qrModal").style.display="none";
}

</script>

</body>

</html>