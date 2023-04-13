<?php
session_start();
require('connection.php');

if(!isset($_SESSION['id'])){
    header("Location: adminlogin.php");
    exit();
} 
?>
