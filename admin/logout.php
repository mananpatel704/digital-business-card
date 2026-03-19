<?php

session_start();

/* destroy admin session */

session_destroy();

/* redirect to login page */

header("Location: login.php");
exit;

?>