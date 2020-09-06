<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Banner\Banner;
//print_r($_SERVER['REQUEST_METHOD']); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



$banner = new Banner();
$result = $banner->deactivate($_GET['id']);

//redirect to index page

if($result){
    Message::set('Banner has been inactivated successfully.');
    header("location:active.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:inactive.php");
}
