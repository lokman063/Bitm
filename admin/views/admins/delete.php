<?php
use Bitm\Utility\Utility;
use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

$id = $_GET['id'];

$query = "DELETE FROM `admins` WHERE `admins`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
if($result){
    Message::set('Admin data has been Deleted successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}

