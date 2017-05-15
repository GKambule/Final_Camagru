<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/04
 * Time: 03:37 PM
 */




class DB
{
    public $host        =   host;
    public $username    =   username;
    public $password    =   password;
    public $dbname      =   dbname;

    private $dbh;
    private $test;


    public function __construct($username = username,$password = password, $host = host, $dbname = dbname, $option = [])
    {

        try {

            $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, $option);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connected <br>";
            $this->test = true;
            if ($this->test === true)
                echo "stms = true <br>";

        } catch (PDOException $e) {
            $this->test = false;
            $this->errors = ($e->getMessage());
            if ($this->test === false)
                echo "false <br>";

        }
    }


    public function Disconnect()
    {
        $this->dbh = null;
        $this->test = false;
        echo "Disconnected <br>";
    }

    public function GetRow($query, $param = [])
    {
        try
        {
            $stmt = $this->dbh->prepare($query);
            $stmt->execute($param);
            return $stmt->fetch();
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function GetRows($query, $param = [])
    {
        try
        {
            $stmt = $this->dbh->prepare($query);
            $stmt->execute($param);
            return $stmt->fetchAll();
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function InsertRow($query, $param = [])
    {
        try
        {
            $stmt = $this->dbh->prepare($query);
            $stmt->execute($param);
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    Public function DeleteRow($query, $param = [])
    {
        $this->InsertRow($query, $param);
    }

    public function UpdateRow($query, $param = [])
    {
        $this->InsertRow($query, $param);
    }
}