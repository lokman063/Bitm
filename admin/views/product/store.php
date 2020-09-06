<?php

//print_r($_REQUEST);
//print_r($_FILES);
//die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
//collect the data
$title = $_POST['title'];
$mrp = $_POST['mrp'];
//$promotional_message = $_POST['promotional_message'];


$is_uploaded = false;
if($_FILES['picture']['size']>0) {
    $target_file = $_FILES['picture']['tmp_name'];
    $filename = time() . "_" . $_FILES['picture']['name'];
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




$query = "INSERT INTO `products` (`id`, `brand`, 
                        `category`, `title`, `picture`, 
                        `short_description`, `description`,
                        `cost`, `mrp`,
                        `special_price`, `is_new`,
                        `is_draft`, `is_active`, `total_sales`,
                        `is_deleted`, `created_at`, `modified_at`) 
                        VALUES (NULL, NULL, NULL, :title, :picture, NULL,
                                NULL, NULL, 
                                :mrp, NULL, NULL, NULL, NULL, NULL, NULL, :created_at, :modified_at);";

$sth = $conn->prepare($query);
$sth->bindParam(':title',$title);
$sth->bindParam(':mrp',$mrp);
$sth->bindParam(':picture',$dest_filename);
$sth->bindParam(':created_at',date('Y-m-d h:i:s',time()));
$sth->bindParam(':modified_at',date('Y-m-d h:i:s',time()));
//$sth->bindParam(':promotional_message',$promotional_message);
$result = $sth->execute();

//print_r($result);
//die();
//$sth->bindParam(':promotional_message',$promotional_message);
//$sth->bindParam(':html_banner',$html_banner);

//print_r($result);
//die();
//redirect to index page

    header("location:index.php");
