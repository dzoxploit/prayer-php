<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'usea_db';

try{

    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e){
    die("Database connection failed: " . $e->getMessage());
}

return $pdo;