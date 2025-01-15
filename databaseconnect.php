<?php
$host = 'localhost';
$dbname = 'instruments_db';
$username = "root";
$password = "root";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error : ".$e->getMessage();
}

?>