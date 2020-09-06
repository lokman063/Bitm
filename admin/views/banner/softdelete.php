<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Banner\Banner;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
    Message::set("Good Try");
    header('location:index.php');
    exit();
}


$banner = new Banner();
$result = $banner->softdelelte($_POST['id']);


//redirect to index page
if($result){
    Message::set('Banner has been Trashed successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}








//header("location:index.php");
