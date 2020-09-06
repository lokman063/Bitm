<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Banner\Banner;
//print_r($_SERVER['REQUEST_METHOD']); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



$banner = new Banner();
$result = $banner->restore($_GET['id']);


//redirect to index page
if($result){
    Message::set('Banner has been Restored successfully.');
    header("location:trash.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:trash.php");
}








//header("location:index.php");
