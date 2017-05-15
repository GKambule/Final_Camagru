<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/10
 * Time: 09:22 AM
 */
class Functions
{

    public function emailer ($email, $Fname, $Lname)
    {
        $subject = "Camegru Varification";
        $link = "http://localhost:8080/Camegru/index.php?_ijt=8r9c5moajetupp3ebs8bbsqbhi";
        $message = "'To ' . $Fname . ' ' . $Lname . ' ' . 'Please click on the link to varify your account with us' . $link";
        mail($email, $subject, $message);

    }
}