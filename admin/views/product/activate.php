<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
$id = $_GET['id'];
$query = "UPDATE products SET is_active = 1 WHERE id = :id";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
header("location:inactive.php");
