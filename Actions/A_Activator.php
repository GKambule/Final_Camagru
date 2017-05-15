<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/11
 * Time: 02:51 PM
 */

if(isset($_POST['Activate']))
{
    if(!empty($_POST['Code']) && !empty($_POST['userId']))
    {
        $code = $_POST['Code'];
        $userId = $_POST['userId'];
        $check = new LogingQueries();

        $verify = $check->Activation($userId);
        if($verify === true)
        {
            $msg = "Welcome to my Camegru <br> Your Account is now active <br> Hope you enjoy the site";
            $data = array('msg'=>$msg, 'userId'=>$userId);
            header("location: ../Pages/4_Profile.php?$data");
        }

    }
}


?>