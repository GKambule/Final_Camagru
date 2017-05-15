<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/04
 * Time: 03:05 PM
 */




class setup
{

    private $stmt;


    public function __construct()
    {
        $this->stmt = new CreateDB();
    }
}