<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud";

//connecting to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//selection query
$query = 'SELECT * FROM phonebooks WHERE id = :id';
$sth = $conn->prepare($query);
$sth->bindParam(':id',$_GET['id']);
$sth->execute();

$phonenumber = $sth->fetch(PDO::FETCH_ASSOC);

//print_r($phonenumber);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <dl>
        <dt>ID</dt>
        <dd><?= $phonenumber['id'];?></dd>
        <dt>Phone Number</dt>
        <dd><?= $phonenumber['number'];?></dd>
    </dl>
</body>
</html>
