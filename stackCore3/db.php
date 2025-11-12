<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "stackCore_db";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>