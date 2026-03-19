<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('phpqrcode/qrlib.php');

$text = "QR Library Working";

QRcode::png($text);

?>