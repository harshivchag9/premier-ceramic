<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin"));

    require_once("../class/Blogs.php");
    $blog = new Blogs();

    $blog->deleteBlog($_POST['id']);
?>