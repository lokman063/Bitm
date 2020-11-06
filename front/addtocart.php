<?php
session_start:

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Cart\Cart;
use Bitm\Utility\Utility;
$data = $_POST;
$addtocart = new Cart();
$addtocarts = $addtocart->addtocart($data);

		
header('location:\phpcrud/front/products.php');



