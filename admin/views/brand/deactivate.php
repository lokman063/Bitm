<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;


$id = $_GET['id'];
$query = "UPDATE brands SET is_active = 0 WHERE id = :id";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page

if($result){
    Message::set('Brand has been Deactivated successfully.');
    header("location:active.php");
}else {
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:inactive.php");
}