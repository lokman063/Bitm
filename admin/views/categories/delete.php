<?php


use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");
$id = $_GET['id'];
$query = "DELETE FROM `catagories` WHERE `catagories`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
if ($result) {
    Message::set('Contact has been Deleted successfully.');
    header("location:index.php");
} else {
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:index.php");
}

