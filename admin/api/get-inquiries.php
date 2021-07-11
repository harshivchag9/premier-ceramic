<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin","marketing"));

    require_once("../class/Inquiries.php");
    $class = new Inquiries();
    echo $class->getData();
?>