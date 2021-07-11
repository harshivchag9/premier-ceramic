<?php
    require_once("../database/database.config.php");
    $sql = Database::getConnection();
    $query="INSERT INTO `contact`( `fname`, `lname`, `email`, `subject`, `message`) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[subject]','$_POST[message]')";
    $sql->query($query);
    header("location:../contact-us.php");
?>


