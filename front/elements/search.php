<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));

}else {
    $cart_count = 0;
}
?>

<form class="form-inline mt-2 mt-md-0">

    <a href=cart.php> <i class="fas fa-cart-plus text-success col-2"></i><span><?php echo $cart_count; ?></span></a>
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
<!--    <a href="logout.php">Logout</a>-->
</form>