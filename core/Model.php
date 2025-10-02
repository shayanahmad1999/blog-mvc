<?php
namespace App\Core;

abstract class Model
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
}
