<?php 

$host = "localhost";
$user = "root";
$pass = "emma2020";
$db   = "cee_db";
$port = "3306";


try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}


 ?>