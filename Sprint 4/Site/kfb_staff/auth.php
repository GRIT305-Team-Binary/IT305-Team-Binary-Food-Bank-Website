<?php

session_start();

if(!isset($_SESSION['username']) && $_SERVER['REQUEST_URI'] != '/peters-test-enviornment/Site/kfb_staff/login.php') {
    header('Location: login.php');
}

 ?>
