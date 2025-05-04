<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "cee_db";


try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}


 ?>