<?php


include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data


$id = $_POST['id'];
$name = $_POST['name'];


$query = "UPDATE `catagories` SET `name` = :name WHERE `catagories`.`id` = :id;";


$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':name',$name);

$result = $sth->execute();

//print_r($result);
//redirect to index page
header("location:index.php");
