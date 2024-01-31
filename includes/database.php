<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php-blog";


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function test($data) {
   echo '<pre>';
   print_r ($data);
   echo '</pre>';
   exit;
}
?>