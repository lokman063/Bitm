<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Category\Category;
use Bitm\Utility\ImageUpload;


//collect the data

$data = $_POST;

$Category = new Category();
$result = $Category->store($data);


if($result){
    Message::set('Category has been added successfully.');
    header("location:index.php");
}else {
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}