<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin"));

    require_once("../class/Blogs.php");
    $blog = new Blogs();

    $blog->updateBlog($_POST['blogid'],$_POST['blogedittitle'],$_POST['blogdescription'],$_POST['blogpath'],$_FILES);
?>