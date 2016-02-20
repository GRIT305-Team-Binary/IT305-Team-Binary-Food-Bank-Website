<?php
    $username = '***';
    $password = '***';
    $hostname = 'localhost';
    $database = '***';
    
    $cnxn = @mysqli_connect($hostname, $username, $password, $database)
        or die('Error connecting to database: ' . mysqli_connect_error());
    
    //echo 'Connected to database!';
?>