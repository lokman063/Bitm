<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Brand\Brand;
use Bitm\Utility\ImageUpload;


//collect the data

$data = $_POST;





$upload = new ImageUpload();
$is_uploaded = $upload->addImage($_FILES);

$data['brand_picture'] = $is_uploaded ;

$brand = new Brand();
$result = $brand->store($data);


if($result){
    Message::set('Brand has been added successfully.');
    header("location:index.php");
}else {
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}