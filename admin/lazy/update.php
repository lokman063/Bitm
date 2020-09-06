<?php
//collect the data
$id = $_POST['id'];
$lazy = $_POST['lazy'];
//connect to database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "phpcrud";

//connecting to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `wearelazies` 
SET `lazy` = :lazy 
WHERE `wearelazies`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':lazy',$lazy);
$result = $sth->execute();

//redirect to index page
header("location:index.php");
