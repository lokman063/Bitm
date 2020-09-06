<?php
//print_r($_REQUEST); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
$id = $_GET['id'];
$query = "DELETE FROM `subscribers` WHERE `subscribers`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
header("location:index.php");








//header("location:index.php");
