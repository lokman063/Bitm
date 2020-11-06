<?php
sesssion_start:
namespace Bitm\Cart;
use Bitm\Db\Db;
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Product\Product;
use PDO;

class Cart
{

function addtocart($data){

    $status="";
    if (isset($data['id']) && $data['id']!=""){
    $id = $data['id'];
    $product = new Product();
    $products = $product->show($id);
    $product_code = $products['product_code'];
    $product_title = $products['product_title'];
    $id = $products['id'];
    $qty = $data['qty'];
    $mrp = $products['mrp'];
    $product_picture = $products['product_picture'];
$cartArray = array(
$product_code=>array(
'product_title'=>$product_title,
'product_code'=>$product_code,
'id'=>$id,
'mrp'=>$mrp,
'qty'=>$qty,
'product_picture'=>$product_picture)
);

if(empty($_SESSION["shopping_cart"])) {
$_SESSION["shopping_cart"] = $cartArray;
$status = "<div class='box'>Product is added to your cart!</div>";
}else{
$array_keys = array_keys($_SESSION["shopping_cart"]);
if(array_key_exists($product_code,$array_keys)) {
    $status = "<div class='box' style='color:red;'>
    Product is already added to your cart!</div>";	
} else {
$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
$status = "<div class='box'>Product is added to your cart!</div>";
}
}

}



}

function deletecart($data){


    if (isset($data['action']) && $data['action']=="remove"){
        if(!empty($_SESSION["shopping_cart"])) {
            foreach($_SESSION["shopping_cart"] as $key => $value) {
                if($data["product_code"] == $key){
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
                Product is removed from your cart!</div>";
                }
                if(empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
                    }		
                }
        }



}

function updateqty($data){

    if (isset( $data['qty'])){
        foreach($_SESSION["shopping_cart"] as &$value){
          if($value['product_code'] === $data["product_code"]){
              $value['qty'] = $data["qty"];
              break; // Stop the loop after we've found the product
          }
      }
            
      }
      

}

}
    


?>

