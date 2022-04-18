<?php

namespace database;

use PDO;
use PDOException;

class Database
{
	public $db;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {
        $this->connect();
    }	
    
    public function connect()
	{
		try {
			$this->db = new PDO('mysql:host=' . DATABASE_CONFIG['hostname'] . ';dbname=' . DATABASE_CONFIG['database'], DATABASE_CONFIG['username'], DATABASE_CONFIG['password']);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
        catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
		}
	}
}
