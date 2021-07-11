<?php


if(isset($_GET["id"]))
{
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin","production"));

    require_once("../class/Products.php");

    $id=$_GET["id"];
    $product = new Products();
    $product->deleteProduct($id);
}
?>