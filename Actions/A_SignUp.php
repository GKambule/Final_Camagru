<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/09
 * Time: 10:36 PM
 */
include_once ('../functions/Functions.php');
include_once ('../database/LogingQueries.php');

if(isset($_POST['SignUp']))
{
    if(!empty($_POST['email']) && !empty($_POST['Fname']) && !empty($_POST['Lname']) && !empty($_POST['Pword']))
    {
        $email = $_POST['email'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Pword = $_POST['Pword'];

        $email = stripslashes($email);
        $Pword = stripslashes($Pword);

        $format = new Functions();
        if($format->Cstr_email($email) === true)
        {
            $msg = "";
            $db_email = $format->Sanitize($email);
        }
        else
        {

            $msg = "Invalid Email";
            $db_email = null;
            header("location: ../Pages/2_SignUpPage.php?msg = $msg");
        }

        if($format->Cstr_names($Fname) === true)
        {
            $msg = "";
            $db_Fname = $Fname;
        }
        else
        {

            $msg = "Only alphabets allowed for your First Name";
            $db_Fname = null;
            header("location: ../Pages/2_SignUpPage.php?msg=$msg");
        }


        if($format->Cstr_names($Lname) === true)
        {
            $msg = "";
            $db_Lname = $Lname;
        }
        else
        {

            $msg = "Only alphabets allowed for your Last Name";
            $db_Lname = null;
            header("location: ../Pages/2_SignUpPage.php?msg=$msg");
        }



        $verify = new LogingQueries();
        if($verify->SignUpCheck($db_email) === 1)
        {
            $verify->Disconnect();
            $msg = "Email already exists";
            header("location: ../Pages/2_SignUpPage.php?msg=$msg");
        }
        else
        {
            $db_Pword = password_hash($Pword, PASSWORD_DEFAULT);
            $Acode = $format->CodeGen();
            $verify->SignUpInsert($db_email, $db_Pword, $db_Fname, $db_Lname, $Acode);
            $format->Emailer($db_email, $Acode);
            $msg = "Your account was created successfully <br> Check your emails to complete your registration!";
            $verify->Disconnect();
            header("location: ../Pages/2_SignUpPage.php?msg=$msg");
        }

    }
    else
    {
        $msg = "Error With the posting";
        header("location: ../Pages/2_SignUpPage.php?msg=$msg");
    }
}


?>