<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/11
 * Time: 07:07 AM
 */
class Functions
{

    public function Cstr_email($email)
    {
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function Cstr_names($names)
    {
        if (preg_match("/^[a-zA-Z ]*$/",$names))
        {
            return true;
        }
        else
            return false;
    }

    public function Sanitize($email)
    {

        $filtered = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $filtered;
    }

    public function Cemail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === true)
            return true;
        else
            return false;
    }

    public function Emailer($email,$A_code)
    {
        $to = $email;
        $subject = "Verification";
        $msg = "You have received your activation code for your Camegru account <br>";
        $msg .= "Please enter it into the relevent field when prompted <br>";
        $msg .= "Activation Code <br>";
        $msg .= $A_code;

        mail($to, $subject, $msg);
    }

    public function CodeGen()
    {
        $uniqid = uniqid();
        return $uniqid;
    }

}