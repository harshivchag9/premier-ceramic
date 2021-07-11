<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin","marketing","production"));

    require_once("../class/Orders.php");
    $order = new Orders();
    echo $order->getData();
?>
