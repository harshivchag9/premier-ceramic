<?php
session_start();
unset($_SESSION['loggeduserid']);
unset($_SESSION['userData']);
session_unset();
session_destroy();

// echo $_SESSION['loggeduserid'];
header("location:../index.php");



?>