<?php
print_r($_REQUEST);


include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data

//
/**
$target_file =  $_FILES['picture']['tmp_name'];
$filename = time()."_".$_FILES['picture']['name'];
$dest_file =  $_SERVER['DOCUMENT_ROOT'].'/phpcrud/uploads/'.$filename;
// echo $_FILES['picture']['tmp_name'];
//echo $_FILES['picture']['size'];
$is_uploaded = move_uploaded_file($target_file,$dest_file);

if ($is_uploaded){
    $dest_filename = $filename;
}
else{
    $dest_filename = "";
}
*/
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];


$query = "UPDATE `contacts` SET `name` = :name, `email` = :email, `subject` = :subject WHERE `contacts`.`id` = :id;";


$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':name',$name);
$sth->bindParam(':email',$email);
$sth->bindParam(':subject',$subject);
$result = $sth->execute();

//print_r($result);
//redirect to index page
header("location:index.php");
