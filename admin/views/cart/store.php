<?php

//print_r($_FILES);
//die();

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
//collect the data

$product_id = $_POST['product_id'];
$product_title = $_POST['product_title'];
$qty = $_POST['qty'];
$unite_price = $_POST['unite_price'];




//else can be avoid by using $is_active = 0;

//dd($_FILES);

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
//die($uploaded);


//$title = $_POST['promotional_message'];
//$title = $_POST['html_banner'];


//prepare the insert query
//selection query




$query = "INSERT INTO `carts` (`id`,
 `sid`, 
 `product_id`, 
 `picture`,
  `product_title`,
   `qty`,
    `unite_price`,
     `total_price`) VALUES
      (NULL,
       NULL,
       :product_id,
        :picture,
          :product_title,
         :qty,
          :unite_price,
            NULL);";

$sth = $conn->prepare($query);
$sth->bindParam(':product_id',$product_id);
$sth->bindParam(':product_title',$product_title);
$sth->bindParam(':picture',$dest_filename);
$sth->bindParam(':qty',$qty);
$sth->bindParam(':unite_price',$unite_price);

//$sth->bindParam(':promotional_message',$promotional_message);
//$sth->bindParam(':html_banner',$html_banner);
$result = $sth->execute();

//print_r($result);
//redirect to index page
if($result){
Message::set('Banner has been added successfully.');
header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}