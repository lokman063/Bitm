<?php

// print_r($_REQUEST);
// die();
include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");

use Bitm\Utility\Message;
use Bitm\Utility\Utility;
// print_r($_FILES);
// die();
//collect the data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
//$nid_birth = $_POST['nid_birth'];
// if (!empty($nid_birth)) {
//     $nid_birth = $_POST['nid_birth'];
// }else {
//     $nid_birth = null;
// }



// $is_uploaded = false;
// if($_FILES['photo']['size']>0) {
//     $target_file = $_FILES['photo']['tmp_name'];
//     $filename = time() . "_" . $_FILES['photo']['name'];
//     $dest_file = $_SERVER['DOCUMENT_ROOT'] . '/phpcrud/uploads/' . $filename;
//     // echo $_FILES['picture']['tmp_name'];
// //echo $_FILES['picture']['size'];
//     $is_uploaded = move_uploaded_file($target_file, $dest_file);
// }
// if ($is_uploaded){
//     $dest_filename = $filename;
// }
// else{
//     $dest_filename = "";
// }







//prepare the insert query
//selection query
    $query = "INSERT INTO `admins` (`id`, 
    `first_name`,
    `email`,
    `password`, 
    `phone`, 
    `is_draft`,
    `created_at`,
    `modified_at`,
    `last_name`, 
    `father_name`,
    `mother_name`,
    `photo`, 
    `nid_birth`,
    `is_deleted`) VALUES (NULL,
    :first_name, 
    :email,
     NULL,
    :phone,
     NULL,
     :created_at,
     :modified_at,
    :last_name,
    :father_name, 
    :mother_name,
    :photo,
   NULL, 
    NULL);";

$sth = $conn->prepare($query);
$sth->bindParam(':first_name', $first_name);
$sth->bindParam(':last_name', $last_name);
$sth->bindParam(':father_name', $father_name);
$sth->bindParam(':mother_name', $mother_name);
$sth->bindParam(':email',$email);
$sth->bindParam(':phone',$phone);
$sth->bindParam(':photo',$dest_filename);
// $sth->bindParam(':nid_birth', $nid_birth);
$sth->bindParam(':created_at',date('Y-m-d h:i:s',time()));
$sth->bindParam(':modified_at',date('Y-m-d h:i:s',time()));
$result = $sth->execute();

//var_dump($result);



if($result){
    Message::set('Admin data has been added successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}

