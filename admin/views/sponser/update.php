<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



//collect the data
$id = $_POST['id'];
$title = $_POST['title'];
$picture = $_POST['picture'];



$query = "UPDATE `sponsers` SET 
`title` = :title,
`picture` = :picture 
WHERE `sponsers`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':title',$title);
$sth->bindParam(':picture',$picture);
$result = $sth->execute();

//redirect to index page
header("location:index.php");
