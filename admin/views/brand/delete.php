<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");

use Bitm\Utility\Message;


$id = $_GET['id'];
$query = "DELETE FROM `brands` WHERE `brands`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

if($result){
    Message::set('Brand has been Deleted successfully.');
    header("location:index.php");
}else {
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:index.php");
}