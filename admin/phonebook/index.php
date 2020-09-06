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
$query = "SELECT * FROM `phonebooks`";
$sth = $conn->prepare($query);
$sth->execute();
$phonenumbers = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
//print_r($phonenumbers);
echo "</pre>";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="create.php">Add a Phone Number</a>
<table border="1">
    <tr>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
    <tbody>
    <?php
    if($phonenumbers){
        foreach($phonenumbers as $pn){
    ?>
    <tr>
        <td><a href="show.php?id=<?= $pn['id']?>"><?php echo $pn['number']?></a></td>
        <td><a href="edit.php?id=<?= $pn['id']?>">Edit </a>| <a href="delete.php?id=<?= $pn['id']?>">Delete</a></td>
    </tr>
<?php
        } }else{
?>
    <tr>
        <td colspan="2">No number is available</td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>
