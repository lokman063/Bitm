<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data
$body = $_POST['body'];
$name = $_POST['name'];
//$picture = $_POST['picture'];
//connect to database


//prepare the insert query
//selection query
$query = "INSERT INTO `testimonials` (`id`, `body`, `picture`, `name`, `designation`, `is_active`, `is_draft`, `soft_delete`, `created_at`, `modified_at`) VALUES (NULL, :body, NULL, :name, NULL, NULL, NULL, NULL, NULL, NULL);";

$sth = $conn->prepare($query);
$sth->bindParam(':name',$name);
$sth->bindParam(':body',$body);
//$sth->bindParam(':picture',$picture);
$result = $sth->execute();


//redirect to index page
header("location:index.php");
