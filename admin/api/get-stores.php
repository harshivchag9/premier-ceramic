<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin"));

    require_once("../class/Stores.php");
    $store = new Stores();

    echo $store->getData();
?>
