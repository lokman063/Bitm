<?php

//print_r($_POST);
//die();

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Admin\Admin;
use Bitm\Utility\ImageUpload;



$data = $_POST;



$upload = new ImageUpload();
$is_uploaded = $upload->addImage($_FILES);

$data['picture'] = $is_uploaded ;

$admin = new Admin();
$result = $admin->store($data);



            

if($result){
Message::set('Admin has been added successfully.');
header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}