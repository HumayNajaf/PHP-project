<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header('Location: login.php');
    die;
}
if(!isset($_SESSION['user']['id'])){
    header('Location: login.php');
    die;
}
logout();
?>