<?php

class Model
{
    public $db;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {
        require($_SERVER['DOCUMENT_ROOT'] . '/app/DB/connect.php');
        $this->db = new database\Database();
    }
}