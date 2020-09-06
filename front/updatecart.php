
<?php

use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data
$id = $_POST['id'];
$qty = $_POST['qty'];


//$query = "UPDATE `brands` SET `title` = 'vgbcbcd', `picture` = '1556129250d_SP-TESEI-TITANIUM-SP-5061-03.png', `modified_at` = '2019-04-02 06:07:30' WHERE `brands`.`id` = 4;";
$query = "UPDATE `carts` SET 
`qty` = :qty 


WHERE `carts`.`id` = :id;";

//echo $query;die();

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->bindParam(':qty',$qty);

$result = $sth->execute();
//print_r($result);die();
if($result){
    //message
    header('location:cart.php');
}else{
    //message
}

