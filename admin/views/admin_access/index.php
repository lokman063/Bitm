<?php
$user = true;
session_start();
if($user){
    $_SESSION['logged_in']  = true;
    //header('location:'.$_SERVER['HTTP_REFERER']);
    header("location:http://localhost/phpcrud/admin/views/dashboard/index.php");
}else{
    $_SESSION['logged_in'] = false;
    header("location:http://localhost/phpcrud/admin/views/dashboard/index.php");
}