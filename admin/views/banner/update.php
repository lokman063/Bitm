<?php

use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Utility\ImageUpload;
use Bitm\Banner\Banner;




//$pre_picture = $data['pre_picture'];

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data



$data = $_POST;


//else can be avoid by using $is_active = 0;
if(array_key_exists('is_active',$data)){
    $data['is_active'] = 1;// also can be use $is_active = $_POST['is_active'];
}
else{
    $data['is_active']  = 0;
}



$upload = new ImageUpload();
$is_uploaded = $upload->updateImage($_FILES,$data['pre_picture']);
$data['picture'] = $is_uploaded;


$banner = new Banner();
$result = $banner->update($data);



if($result){
    Message::set('Banner has been Updated successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:edit.php");
}