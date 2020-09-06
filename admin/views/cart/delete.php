<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");


$id = $_POST['id'];


$query = "DELETE FROM `carts` WHERE `carts`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
if($result){
    Message::set('Banner has been Deleted successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}








//header("location:index.php");
