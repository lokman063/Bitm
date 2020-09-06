<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Brand\Brand;
//print_r($_SERVER['REQUEST_METHOD']); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



$brand = new Brand();
$result = $brand->deactivate($_GET['id']);

//redirect to index page

if($result){
    Message::set('Brand has been inactivated successfully.');
    header("location:active.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:inactive.php");
}
