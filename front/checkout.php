
<?php


session_start:

include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");

?>

<!doctype html>
<html lang="en">
<?php include_once('elements/head.php'); ?>

<body>
<?php include_once('elements/header.php'); ?>
<main role="main">




<!--================Checkout Area =================-->
<section class="container_fluid">
    <div class="container">
    <?php include_once('elements/customers/customer_signIn.php'); ?>



        <!-- <div class="cupon_area">
            <div class="check_title">
                <h2>
                    Have a coupon?
                    <a href="#">Click here to enter your code</a>
                </h2>

            </div>
            <input type="text" placeholder="Enter coupon code" />
            <a class="tp_btn" href="#">Apply Coupon</a>
        </div> -->

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">


 <h3>Billing Details</h3>
                 

 <?php include_once('elements/customers/customer_signUp.php'); ?>


                </div>

                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>

                        <ul class="list">
                            <li>
                                <a href="#"
                                >Total Product
                              

                                </a>
                            </li>

                            <?php
                            $subtotal =0;
                           
                            if(!empty($_SESSION["shopping_cart"])){
                                foreach($_SESSION["shopping_cart"] as $cart):
                              $subtotal = $subtotal + $cart['mrp'] * $cart['qty'];
                            ?>



                     
                            <li>
                                <a href="#"
                                ><span>Product Title: </span><?php echo $cart['product_title']?>

                                    
                                </a>
                            </li>
                                <?php
                            endforeach;
                        }
                            ?>
                        </ul>
                        <ul class="list list_2">

                            <li>

                                <a href="#"
                                >Subtotal
                                    <span> <?php echo $subtotal;?></span>
                                </a>

                            </li>
                            <li>
                                <a href="#"
                                >Shipping
                                    <span>Flat rate: $50.00</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                >Total
                                    <span><?php echo $subtotal+50;?></span>
                                </a>
                            </li>

                        </ul>

                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector" />
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name, Store Street, Store Town,
                                Store State / County, Store Postcode.
                            </p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector" />
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/single-product/card.jpg" alt="" />
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name, Store Street, Store Town,
                                Store State / County, Store Postcode.
                            </p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector" />
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <button class="main_btn" href="#">Proceed to Paypal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






</main>
<?php include_once('elements/footer.php'); ?>
<?php include_once('elements/scripts.php'); ?>
</body>
</html>

