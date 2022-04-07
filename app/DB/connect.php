<?php
try{
    $db = new PDO('mysql:host='.DATABASE_CONFIG['hostname'].';dbname='.DATABASE_CONFIG['database'], DATABASE_CONFIG['username'],DATABASE_CONFIG['password']);
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}