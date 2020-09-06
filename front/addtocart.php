<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
$product_id=$_POST['id'];
//$sid=session_id();



//$picture=$_GET['picture'];
$product_title=$_POST['title'];
$unite_price=$_POST{'mrp'};
$qty=1;
$total_price=$unite_price * $qty;


$query = "INSERT INTO `carts`
  (`id`, 
   `sid`, 
   `product_id`, 
   `picture`,
   `product_title`,
   `qty`, `unite_price`,
   `total_price`) VALUES
                         (NULL,
                          NULL, 
                          :product_id, 
                          NULL, 
                          :product_title,
                          :qty, 
                          :unite_price, 
                          :total_price);";


$sth = $conn->prepare($query);
$sth->bindParam(':product_id',$product_id);
$sth->bindParam(':product_title',$product_title);
$sth->bindParam(':qty',$qty);
$sth->bindParam(':unite_price',$unite_price);
$sth->bindParam(':total_price',$total_price);

//$sth->bindParam(':html_banner',$html_banner);
$result = $sth->execute();
header('location:\phpcrud/front/products.php');
