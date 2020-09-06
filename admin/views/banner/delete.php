<?php
use Bitm\Db\Db;
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Banner\Banner;
//print_r($_SERVER['REQUEST_METHOD']); die();


    $id = $_POST['id'];
    $picture = $_POST['picture'];
    
    
  

   



include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
    Message::set("Good Try");
    header('location:index.php');
    exit();
}
$banner = new Banner();
$result = $banner->delete($id);
//var_dump($result); die();
//redirect to index page
if($result){
   
    unlink($_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/'.$picture);
    Message::set('Banner has been Deleted successfully.');
    header("location:trash.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:trash.php");
}








//header("location:index.php");
