<?php

    if(isset($_POST))
    {
        require_once("../class/Authenticate.php");
        Authenticate::Authentication(array("admin","production"));

        require_once("../class/Products.php");
        $name=$_POST["name"];
        $color=$_POST["color"];
        $type=$_POST["type"];
        $price=$_POST["price"];
        $pieceinbox=$_POST["pieceinbox"];
        $thickness=$_POST["thickness"];
        $weight=$_POST["weight"];
        $usage=$_POST["usage"];
        $size=$_POST["size"];
        $stock=$_POST["stock"];
        

        $product = new Products();
        $product->addProduct($name,$color,$type,$price,$pieceinbox,$thickness,$weight,$usage,$size,$stock,$_FILES);



    }
?>