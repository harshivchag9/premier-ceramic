<?php

    if(isset($_POST)){
      
        require_once("../class/Authenticate.php");
        Authenticate::Authentication(array("admin"));

        require_once("../class/Users.php");
        $user = new Users();

        $id=trim($_POST["id"]);
        $username=trim($_POST['username']);
        $email=trim($_POST["email"]);
        $role=trim($_POST["role"]);
        
        
        $user->updateUser($id, $username, $email, $role);

    }

?>