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
<form action="update.php" method="post">
    <fieldset>

        <legend>Edit the phone number</legend>
        <div>
            <label for="phonenumber">Enter Phone Number</label>
            <input
                type="text"
                name="id"

                value="<?php echo $phonenumber['id'];?>"
            />
            <input
                type="text"
                name="number"
                autofocus="autofocus"
                placeholder="e.g +88 01675420232"
                value="<?php echo $phonenumber['number'];?>"
            />
        </div>

        <button type="submit">Save</button>
    </fieldset>
</form>
</body>
</html>