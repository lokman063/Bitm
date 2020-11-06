<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Product\Product;
//print_r($_SERVER['REQUEST_METHOD']); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



$product = new Product();
$result = $product->restore($_GET['id']);


//redirect to index page
if($result){
    Message::set('Product has been Restored successfully.');
    header("location:trash.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:trash.php");
}








//header("location:index.php");
