<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/05
 * Time: 10:27 AM
 */
include_once ('../config/database.php');
include_once ('DB.php');




class LogingQueries
{
    protected $conn;
    public $query;

    public function __construct()
    {
        $this->conn = new DB();

    }

    public function SignUpCheck($email)
    {

        $query = "SELECT Email FROM Users WHERE Email= ?";
        $check = $this->conn->GetRow($query, [$email]);
        return $check;
    }

    public function LoginCheck($email, $password)
    {
        //Should bring up userId
        $query = "SELECT * FROM Users WHERE Email= ? AND Password = ?";
        //$inner = "SELECT UserId FROM Users WHERE Email= ? AND Password = ?";
        $check = $this->conn->GetRow($query, ["$email", "$password"]);
        return $check;
    }

    public function SignUpInsert($email, $password, $firstname, $lastname, $Acode)
    {
        $query = "INSERT INTO Users(Firstname, Lastname, Password, Email, Acode) VALUE (?, ?, ?, ?, ?)";
        $this->conn->InsertRow($query, ["$firstname", "$lastname", "$password", "$email", $Acode]);
        return true;
    }

    public function Activation($userId)
    {
        $query = "UPDATE Users SET Status = 1 WHERE UserId = ?";
        $this->conn->UpdateRow($query, ["$userId"]);
        return true;
    }

    public function Disconnect()
    {
        $this->conn->Disconnect();
    }
}


//ADD TRY & CATCH In Requests