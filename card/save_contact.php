<?php
include('../config/database.php');

$id=$_GET['id'];

$query="SELECT * FROM employees WHERE id='$id'";
$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

header('Content-Type: text/vcard');
header('Content-Disposition: attachment; filename=contact.vcf');

echo "BEGIN:VCARD
VERSION:3.0
FN:".$row['name']."
TEL:".$row['phone']."
EMAIL:".$row['email']."
END:VCARD";
?>