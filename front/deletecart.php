<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");

use Bitm\Utility\Message;


$id = $_GET['id'];
$query = "DELETE FROM `carts` WHERE `carts`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();


    header("location:cart.php");
