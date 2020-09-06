
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

//collect the data
$id = $_GET['id'];


$query = "DELETE FROM `testimonials` WHERE `testimonials`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
header("location:index.php");