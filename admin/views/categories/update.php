<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Category\Category;

$data = $_POST;
$Category = new Category();
$result = $Category->update($data);


if($result){
    Message::set('Category has been Updated successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:edit.php");
}