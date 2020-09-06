<?php
//check if you have your data posted using the form
//no relation with entering data into database
//print_r($_POST);
//collect the data

$number = $_POST['number'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud";

//connecting to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "INSERT INTO `phonebooks` (`id`,`name`, `number`) 
VALUES (NULL,:name, :number);";
$sth = $conn->prepare($query);
$sth->bindParam(':number',$number);
$sth->bindParam(':name',$name);
$result = $sth->execute();

//print_r($result);
//redirect to index page
header("location:index.php");