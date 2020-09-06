<?php
//check if you have your data posted using the form
//no relation with entering data into database
//print_r($_POST);
//collect the data

$id = $_GET['id'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "phpcrud";

//connecting to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM `phonebooks` WHERE `phonebooks`.`id` = :id";
$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//print_r($result);
//redirect to index page
header("location:index.php");