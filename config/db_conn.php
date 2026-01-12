<?php
try{
$host="localhost";
$username="root";
$password="";
$database="kelly_hoppen";


    $conn = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8mb4",
        $username,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException  $e){
      die("Database connection failed: " . $e->getMessage());
}
define("BASE_URL","http://localhost/apps/naimisha/kelly_hopen/");
?>