<?php
use Bitm\Db\Db;
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Product\Product;
//print_r($_SERVER['REQUEST_METHOD']); die();


    $id = $_POST['id'];
    $picture = $_POST['picture'];
    
    
  
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
    Message::set("Good Try");
    header('location:index.php');
    exit();
}
$product = new Product();
$result = $product->delete($id);
//var_dump($result); die();
//redirect to index page
if($result){
   
    unlink($_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/'.$picture);
    Message::set('Product has been Deleted successfully.');
    header("location:trash.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:trash.php");
}








//header("location:index.php");
