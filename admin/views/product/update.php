<?php

use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Utility\ImageUpload;
use Bitm\Product\Product;




//$pre_picture = $data['pre_picture'];

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data



$data = $_POST;



$upload = new ImageUpload();
$is_uploaded = $upload->updateImage($_FILES,$data['pre_picture']);
$data['product_picture'] = $is_uploaded;


$product = new Product();
$result = $product->update($data);



if($result){
    Message::set('Banner has been Updated successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:edit.php");
}