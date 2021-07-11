<?php

    if(isset($_POST)){
        require_once("../class/Authenticate.php");
        Authenticate::Authentication(array("admin","production"));

        require_once("../class/Products.php");
        $product = new Products();
        $id=$_POST["id"];
        $name=trim($_POST['name']);
        $color=trim($_POST["color"]);
        $type=trim($_POST["type"]);
        $price=trim($_POST["price"]);
        $pieceinbox=trim($_POST["pieceinbox"]);
        $thickness=trim($_POST["thickness"]);
        $weight=trim($_POST["weight"]);
        $usage=trim($_POST["usage"]);
        $size=trim($_POST["size"]);
        $stock=trim($_POST["stock"]);
        
        $product->updateProduct($id,$name,$color,$type,$price,$pieceinbox,$thickness,$weight,$usage,$size,$stock);

    }

?>