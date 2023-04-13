<?php
session_start();
session_destroy(); // destroy all session data
header("Location: adminlogin.php"); // redirect to login page
exit;
?>
