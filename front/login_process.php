<?php
$user = true;
session_start();
if($user){
    $_SESSION['loggedin_user'] = true;
    //header('location:'.$_SERVER['HTTP_REFERER']);
    header('location:index.php');
}else{
    $_SESSION['loggedin_user'] = false;
    header('location:login.php');
}