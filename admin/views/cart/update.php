<?php


//print_r($_REQUEST);
//print_r($_FILES);
//die();

use Bitm\Utility\Message;




include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data
$id = $_POST['id'];
$product_id = $_POST['product_id'];
$product_title = $_POST['product_title'];
$qty = $_POST['qty'];
$pre_picture = $_POST['pre_picture'];
$unite_price = $_POST['unite_price'];

// dd($_FILES);





if($_FILES['picture']['size']>0){
    $target_file =  $_FILES['picture']['tmp_name'];
    $filename = time()."_".$_FILES['picture']['name'];
    $dest_file =  $_SERVER['DOCUMENT_ROOT'].'/phpcrud/uploads/'.$filename;
// echo $_FILES['picture']['tmp_name'];
//echo $_FILES['picture']['size'];
    $is_uploaded = move_uploaded_file($target_file,$dest_file);
}
if ($is_uploaded){
    $dest_filename = $filename;
}
else{
    $dest_filename = $pre_picture;
}



$query = "UPDATE `carts` SET 
`product_id` = :product_id, 
`product_title` = :product_title, 
`picture` = :picture,
 `qty` = :qty,
  `unite_price` = :unite_price
   WHERE `carts`.`id` = :id;";


$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':product_id',$product_id);
$sth->bindParam(':product_title',$product_title);
$sth->bindParam(':picture',$dest_filename);
$sth->bindParam(':qty',$qty);
$sth->bindParam(':unite_price',$unite_price);

$result = $sth->execute();


//redirect to index page

if($result){
    Message::set('cart has been Updated successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}