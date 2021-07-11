<?php
    if(isset($_POST['id']))
    {
        require_once("../class/Authenticate.php");
        Authenticate::Authentication(array("admin","marketing","production"));

        require_once("../class/Orders.php");
        $order = new Orders();
        $id = $_POST['id'];
        echo $order->getPayment($id);
    }
?>
