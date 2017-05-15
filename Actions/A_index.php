<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/09
 * Time: 03:48 PM
 */

include_once ('../functions/Functions.php');
include_once ('../database/LogingQueries.php');

if(isset($_POST['SignIn']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {

        $email = $_POST['email'];
        $Pword = $_POST['password'];

        $email = stripslashes($email);
        $Pword = stripslashes($Pword);

        $format = new Functions();
        if($format->Cstr_email($email) === true)
        {
            $db_email = $format->Sanitize($email);
        }
        else
        {
            $msg = "Invalid Email";
            $db_email = null;
            header("location: ../index.php?msg1=$msg");

        }



        $conn = new LogingQueries();
        $carry = $conn->LoginCheck($db_email, $Pword);
        if($carry != null)
        {
           $userId = $carry['UserId'];
           $pass = $carry['Password'];
           $status = $carry['Status'];
           $Acode = $carry['Acode'];
           $user = $carry['FirstName'];

           $verify = PASSWORD_VERIFY($Pword, $pass);

           if($verify === true && $status == 0)
           {
               $msg = "Enter your Activation Code";
               $data = array('userId'=>$userId, 'Acode'=>$Acode, 'msg'=>$msg);
               header("location: ../Pages/8_Activator.php?$data");
           }
           elseif ($verify === true && $status == 1)
           {
               $msg = "Logged In <br> Welcome . $user";
               $data = array('userId'=>$userId,'msg'=>$msg);
               header("location: ../Pages/4_Profile.php?$data");
           }
           else
           {
               $msg = "Password Incorrect";
               $data = array('msg'=>$msg);
               header("location: ../index.php?$data");
           }

        }
        else
        {
            $msg = "Username or Password is invalid";
            $data = array('msg'=>$msg);
            header("location: ../index.php?$data");
        }

    }
    else
    {

        $msg = "Both Username and Password are Required!";
        $data = array('msg'=>'$msg');
        header("location: ../index.php?$data");

    }

}




?>