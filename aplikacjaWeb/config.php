<?php
/*
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $database = "planerdb";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    */

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'planerdb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
?>