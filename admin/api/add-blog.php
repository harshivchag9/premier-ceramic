<?php
    if($_POST)
    {
        require_once("../class/Authenticate.php");
        Authenticate::Authentication(array("admin"));

        require_once("../class/Blogs.php");
        $blog = new Blogs();

        $blog->addBlog($_POST['blogTitle'],$_POST['blogDescription'],$_FILES);
    }
?>