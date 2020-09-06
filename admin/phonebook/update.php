<?php
//check if you have your data posted using the form
//no relation with entering data into database
//print_r($_POST);
//collect the data
$id = $_POST['id'];
$number = $_POST['number'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "phpcrud";

//connecting to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `phonebooks` SET 
`number` = :number 

WHERE `phonebooks`.`id` = :id;";
$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':number',$number);
$result = $sth->execute();
echo $query;
//print_r($result);
//redirect to index page
header("location:index.php");