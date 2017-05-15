<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/12
 * Time: 10:42 AM
 */
include_once ('../functions/Functions.php');

echo "Made it here<br>";

if(isset($_POST['SignUp']))
{
    if(!empty($_POST['email']) && !empty($_POST['Fname']) && !empty($_POST['Lname']) && !empty($_POST['Pword'])) {
        $email = $_POST['email'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Pword = $_POST['Pword'];

        $email = stripslashes($email);
        $Pword = stripslashes($Pword);

        echo "first print = " . $email . '<br>';
        echo "first print = " . $Fname . '<br>';
        echo "first print = " . $Lname . '<br>';
        echo "first print = " . $Pword . '<br>';

        $format = new Functions();
        if ($format->Cstr_email($email) === true) {
            $msg = "";
            $db_email = $format->Sanitize($email);
            echo $db_email . '<br>';
        } else {
            header("location: ../Pages/2_SignUpPage.php");
            $msg = "Invalid Email";
            $db_email = null;
            echo "email not clean<br>";
        }

        if ($format->Cstr_names($Fname) === true) {
            $msg = "";
            $db_Fname = $Fname;
            echo $db_Fname . '<br>';
        } else {
            //header("location: ../Pages/2_SignUpPage.php");
            $msg = "Only alphabets allowed for your First Name";
            $db_Fname = null;
            echo "Fname not clean<br>";
        }


        if ($format->Cstr_names($Lname) === true) {
            $msg = "";
            $db_Lname = $Lname;
            echo $db_Lname . '<br>';
        } else {
            header("location: ../Pages/2_SignUpPage.php");
            $msg = "Only alphabets allowed for your Last Name";
            $db_Lname = null;
            echo "Lname not clean";
        }
    }
}


?>