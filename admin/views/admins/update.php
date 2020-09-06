<?php

use Bitm\Utility\Message;

//print_r($_REQUEST);
// print_r($_REQUEST); die();


include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data


// dd($_FILES);
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
//$nid_birth = $_POST['nid_birth'];

$is_uploaded = false;
if($_FILES['photo']['size']>0) {
    $target_file = $_FILES['photo']['tmp_name'];
    $filename = time() . "_" . $_FILES['photo']['name'];
    $dest_file = $_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/' . $filename;
    // echo $_FILES['picture']['tmp_name'];
//echo $_FILES['picture']['size'];
    $is_uploaded = move_uploaded_file($target_file, $dest_file);
}
if ($is_uploaded){
    $dest_filename = $filename;
}
else{
    $dest_filename = "";
}










$query = "UPDATE `admins` SET 
`first_name` = :first_name,
`email` = :email,
`phone` = :phone, 
`last_name` = :last_name,
`father_name` = :father_name,
`mother_name` = :mother_name,
`photo` = :photo
 WHERE `admins`.`id` = :id;";


$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':first_name',$first_name);
$sth->bindParam(':last_name',$last_name);
$sth->bindParam(':father_name',$father_name);
$sth->bindParam(':mother_name',$mother_name);
$sth->bindParam(':email',$email);
$sth->bindParam(':phone',$phone);
$sth->bindParam(':photo',$dest_filename);
//$sth->bindParam(':nid_birth',$nid_birth);
$result = $sth->execute();

//print_r($result);
//redirect to index page

if($result){
    Message::set('Banner has been Updated successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}

































