
<?php



include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Cart\Cart;
use Bitm\Utility\Utility;


$data = $_POST;


$cart = new Cart();
$result = $cart->updateqty($data);





header("location:cart.php");

