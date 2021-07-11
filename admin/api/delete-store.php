<?php


if(isset($_GET["id"]))
{
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin"));

    require_once("../class/Stores.php");
    $id=$_GET["id"];
    $store = new Stores();
    $store->deleteStore($id);
}
?>