<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "testePHP";
    $port  = 3306;

    $conect = mysqli_connect($host, $user, $pass, $dbname);
    mysqli_set_charset($conect, 'utf8');
    if ($conect->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
?>