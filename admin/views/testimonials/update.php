<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data
$id = $_POST['id'];
$name = $_POST['name'];
//connect to database

$query = "UPDATE `testimonials` SET 
`name` = :name 

WHERE `testimonials`.`id` = :id";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':name',$name);
$result = $sth->execute();

//redirect to index page
header("location:index.php");
