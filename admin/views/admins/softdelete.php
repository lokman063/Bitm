<?php

use Bitm\Utility\Utility;
use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
    Message::set("Good Try");
    header('location:index.php');
    exit();
}
$id = $_POST['id'];


$query = "UPDATE admins SET  is_deleted = 1 WHERE id=:id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
if($result){
    Message::set('Admin has been Trashed successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}








//header("location:index.php");
