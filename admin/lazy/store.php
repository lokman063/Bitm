<?php
//collect the data
$lazy = $_POST['lazy'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "phpcrud";

//connecting to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//prepare the insert query
//selection query
$query = "INSERT INTO `wearelazies` ( `lazy`) VALUES ( :lazy );";

$sth = $conn->prepare($query);
$sth->bindParam(':lazy',$lazy);
$result = $sth->execute();


//redirect to index page
header("location:index.php");
