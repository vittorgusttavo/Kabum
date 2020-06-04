<?php 
    session_start();
    $token = md5($_SESSION['id']);
    if(isset($_GET['token']) && $_GET['token'] === $token){
        session_destroy();
        header('Location: login.php');
    }
?>