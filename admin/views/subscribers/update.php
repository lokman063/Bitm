<?php


include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

//collect the data
$id = $_POST['id'];
$email = $_POST['email'];

$reason = $_POST['reason'];
//connect to database


$query = "UPDATE `subscribers` SET `email` = :email, `reason` = :reason WHERE `subscribers`.`id` = :id;";
$sth = $conn->prepare($query);
$sth->bindparam(':id',$id);
$sth->bindparam(':email',$email);

$sth->bindparam(':reason',$reason);

$result=$sth->execute();
//redirect to index page
header("location:index.php");