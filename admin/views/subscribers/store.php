<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

//print_r($_POST);
//die();

//collect the data
$email = $_POST['email'];
$reason = $_POST['reason'];


//prepare the insert query
//selection query
$query = "INSERT INTO `subscribers` (`id`, `email`, `is_subscribed`, `creatd_at`, `modified_at`, `reason`) VALUES (NULL, :email, NULL, NULL, NULL, :reason);";
$sth = $conn->prepare($query);
$sth->bindparam(':email',$email);
$sth->bindparam(':reason',$reason);
$result = $sth->execute();
//print_r($result);
//redirect to index page
header("location:index.php");