<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Db\Db;
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Category\Category;
if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
    Message::set("Good Try");
    header('location:index.php');
    exit();

   }

    $id = $_POST['id'];

 
$Category = new Category();
$result = $Category->delete($id);
//var_dump($result); die();
//redirect to index page
if($result){
   
    Message::set('Category has been Deleted successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:index.php");
}








//header("location:index.php");
