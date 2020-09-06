<?php
session_start();
$_SESSION['loggedin_user'] = false;
//unset($_SESSION['loggedin_user']);
//session_destroy();
header('location:login.php');