<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/05
 * Time: 08:07 AM
 */




class CreateDB
{

    public $host        =   host;
    public $username    =   username;
    public $password    =   password;
    public $dbname      =   dbname;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        try
        {

            $this->dbh = new PDO("mysql:host=$this->host", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
            $this->dbh->exec($sql);
            $sql = "USE $this->dbname";
            $this->dbh->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS CamPix(
                        CamId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
                        UserId INT NOT NULL 
                        )";
            $this->dbh->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS MergePix(
                        MergeId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
                        UserId INT NOT NULL
                        )";
            $this->dbh->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS ServPix(
                        ServId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL 
                        )";
            $this->dbh->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS Users(
                        UserId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
                        Status INT (1) NOT NULL DEFAULT '0',
                        FirstName VARCHAR (255) NOT NULL,
                        LastName VARCHAR (255) NOT NULL,
                        Email VARCHAR (255) NOT NULL,
                        Acode VARCHAR (255) NOT NULL,
                        Password VARCHAR (255) NOT NULL
                        )";
            $this->dbh->exec($sql);
            $this->stmt = true;
        }
        catch(PDOException $e)
        {

            $this->stmt = false;
            throw new Exception ($e->getMessage());

        }

        $this->dbh = null;
    }

}
