<?php

include('phpqrcode/qrlib.php');

$url = "http://localhost/business-card/card/profile.php?id=1";

QRcode::png($url);
?>