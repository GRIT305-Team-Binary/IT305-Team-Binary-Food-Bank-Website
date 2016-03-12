<?php

session_start();

if(!isset($_SESSION['teambinary_KFB_username']) && $_SERVER['REQUEST_URI'] != '/kfb_staff/login.php') {
    header('Location: login.php');
}

 ?>
