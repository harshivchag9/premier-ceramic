
<?php
class Authenticate
{

    public static function Authentication($values) {
        session_start();
        // print_r($_SESSION);
        if (is_array($values) || is_object($values)){
            $flag = false;
            foreach($values as $role)
            {
                if($_SESSION['userData']['role'] == $role ){
                    $flag = true;
                }
            }
            if(!$flag)
            {
                echo "Not Authorized";
                die();
            }
        }
        else{
            die();
        }
    }
}
// Authenticate::Authentication(array("admin","marketing"));

?>