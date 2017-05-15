<?php

/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/05
 * Time: 10:25 AM
 */

include_once ('DB.php');
class TrafficQueries
{
    public $conn;

    public function __construct()
    {
        $this->conn = new DB();
    }

    public function CamPixInsert($image, $usedId)
    {
        $query = "INSERT INTO CamPix(Image, UserId) VALUE (?, ?)";
        $this->conn->InsertRow($query, ["$image", "$usedId"]);
    }

    public function MergePixInsert($image, $usedId)
    {
        $query = "INSERT INTO MergePix(Image, UserId) VALUE (?, ?)";
        $this->conn->InsertRow($query, ["$image", "$usedId"]);
    }

    public function SaveCam($image, $userId)
    {
        $this->CamPixInsert($image, $userId);
    }

    public function SaveMerge($image, $userId)
    {
        $this->MergePixInsert($image, $userId);
    }

    public function Disconnect()
    {
        $this->conn->Disconnect();
    }
}