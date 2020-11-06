<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Product\Product;
//print_r($_SERVER['REQUEST_METHOD']); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



$product = new Product();
$result = $product->unDraft($_GET['id']);

//redirect to index page

if($result){
    Message::set('Banner has been undrafted successfully.');
    header("location:draft.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:draft.php");
}
