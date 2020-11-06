<?php
session_start:

include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");
//selection query
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Cart\Cart;

$status="";




?>






<!doctype html>
<html lang="en">
<?php include_once('elements/head.php'); ?>
<body>
<?php include_once('elements/header.php'); ?>


<main role="main">

    <div class="container marketing">
        <div class="row">
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <section class="ftco-section ftco-cart">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ftco-animate">
                                    <div class="cart-list">
                                        <table class="table">
                                            <thead class="thead-primary">
                                            <tr class="text-center">
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $subtotal = 0;
                                            if(!empty($_SESSION["shopping_cart"])){
                                                  foreach($_SESSION["shopping_cart"] as $cart):
                                                $subtotal = $subtotal + $cart['mrp'] * $cart['qty'];
                                                ?>



                                              
                                            
                                          
                                          
                                            <tr class="text-center">
                                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                                <td class="image-prod"><div class="img"><img src="<?=UPLOADS;?><?php echo $cart['product_picture']?>" width="140px" height="120px"></div></td>

                                                <td class="product-name">
                                                    <h3><?php echo $cart['product_title']?></h3>
                                                </td>

                                                <td class="price"><?php echo $cart['mrp']?></td>

                                                <td class="quantity">
                                                    <form action="updatecart.php" method="post">
                                                    <div class="input-group mb-3">

                                                       <input type="hidden" name="product_code" class="quantity form-control input-number" value="<?php echo $cart['product_code']?>">
                                                        <input type="number" name="qty" class="quantity form-control input-number" value="<?php echo $cart['qty']?>" min="1" max="100">
                                                    </div>
                                                        <button type="submit">Update Cart</button>
                                                        
                                                    </form>
                                    <form method='post' action='deletecart.php'>
                                    <input type='hidden' name='product_code' value="<?php echo $cart["product_code"]; ?>" />
                                    <input type='hidden' name='action' value="remove" />
                                    <button class="btn btn-danger" type="submit" >Remove From Cart</button>
                                    </form>
                                                   

                                                </td>

                                                <td class="total"><?php echo $cart['total_price']= $cart['mrp'] * $cart['qty'];?></td>
                                            </tr><!-- END TR-->
                                            <?php
                                            endforeach;
                                           
                                        }
                                        ?>
                                         

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if (empty($_SESSION["shopping_cart"])) {
                                ?>
<div class="row justify-content-end">
                                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                                    <div class="cart-total mb-3">
                                        <h3>No Cart available</h3>
                                      
                                       
                                    </div>
                                   
                                    <p class="text-center"><a href="http://localhost/phpcrud/front/products.php" class="btn btn-primary py-3 px-4">Go Product List</a></p>
                                </div>
                            </div>
                        </div>
                                <?php
                            }else {
                                ?>

<div class="row justify-content-end">
                                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                                    <div class="cart-total mb-3">
                                        <h3>Cart Totals</h3>
                                        <p class="d-flex">
                                            <h6><u>Subtotal</u></h6>
                                            <span> <p><?php echo $subtotal;?> BDT</span>
                                        </p>
                                        <p class="d-flex">
                                            <p>Delivery</p>
                                           <?php $delivery = 0; echo $delivery;?>
                                        </p>
                                        <p class="d-flex">
                                            <p> Discount </p>
                                            <b> <?php $discount = 0; echo $discount;?></b>
                                        </p>
                                        <hr>
                                        <p class="d-flex total-price">delivery
                                            Total </p>
                                            <span> <?php echo $subtotal + $delivery-$discount?> <b>BDT </b></span>
                                        </p>
                                    </div>
                                    <p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                                    <p class="text-center"><a href="http://localhost/phpcrud/front/products.php" class="btn btn-primary py-3 px-4">Go Product List</a></p>
                                </div>
                            </div>

                                <?php
                            }
                            ?>
                           
                        </div>
                    </section>

                    <!--                    <section class="ftco-section bg-light">-->
                    <!--                        <div class="container">-->
                    <!--                            <div class="row justify-content-center mb-3 pb-3">-->
                    <!--                                <div class="col-md-12 heading-section text-center ftco-animate">-->
                    <!--                                    <h1 class="big">Products</h1>-->
                    <!--                                    <h2 class="mb-4">Related Products</h2>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="container-fluid">-->
                    <!--                            <div class="row">-->
                    <!--                                <div class="col-sm col-md-6 col-lg ftco-animate">-->
                    <!--                                    <div class="product">-->
                    <!--                                        <a href="#" class="img-prod"><img class="img-fluid" src="../lib/img/images%20(1).jpg" alt="Colorlib Template"></a>-->
                    <!--                                        <div class="text py-3 px-3">-->
                    <!--                                            <h3><a href="#">Young Woman Wearing Dress</a></h3>-->
                    <!--                                            <div class="d-flex">-->
                    <!--                                                <div class="pricing">-->
                    <!--                                                    <p class="price"><span>$120.00</span></p>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="rating">-->
                    <!--                                                    <p class="text-right">-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                    </p>-->
                    <!--                                                </div>-->
                    <!--                                            </div>-->
                    <!--                                            <hr>-->
                    <!--                                            <p class="bottom-area d-flex">-->
                    <!--                                                <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>-->
                    <!--                                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>-->
                    <!--                                            </p>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="col-sm col-md-6 col-lg ftco-animate">-->
                    <!--                                    <div class="product">-->
                    <!--                                        <a href="#" class="img-prod"><img class="img-fluid" src="../lib/img/images%20(1).jpg" alt="Colorlib Template"></a>-->
                    <!--                                        <div class="text py-3 px-3">-->
                    <!--                                            <h3><a href="#">Young Woman Wearing Dress</a></h3>-->
                    <!--                                            <div class="d-flex">-->
                    <!--                                                <div class="pricing">-->
                    <!--                                                    <p class="price"><span>$120.00</span></p>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="rating">-->
                    <!--                                                    <p class="text-right">-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                    </p>-->
                    <!--                                                </div>-->
                    <!--                                            </div>-->
                    <!--                                            <hr>-->
                    <!--                                            <p class="bottom-area d-flex">-->
                    <!--                                                <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>-->
                    <!--                                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>-->
                    <!--                                            </p>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="col-sm col-md-6 col-lg ftco-animate">-->
                    <!--                                    <div class="product">-->
                    <!--                                        <a href="#" class="img-prod"><img class="img-fluid" src="../lib/img/images%20(1).jpg" alt="Colorlib Template"></a>-->
                    <!--                                        <div class="text py-3 px-3">-->
                    <!--                                            <h3><a href="#">Young Woman Wearing Dress</a></h3>-->
                    <!--                                            <div class="d-flex">-->
                    <!--                                                <div class="pricing">-->
                    <!--                                                    <p class="price"><span>$120.00</span></p>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="rating">-->
                    <!--                                                    <p class="text-right">-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                    </p>-->
                    <!--                                                </div>-->
                    <!--                                            </div>-->
                    <!--                                            <hr>-->
                    <!--                                            <p class="bottom-area d-flex">-->
                    <!--                                                <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>-->
                    <!--                                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>-->
                    <!--                                            </p>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="col-sm col-md-6 col-lg ftco-animate">-->
                    <!--                                    <div class="product">-->
                    <!--                                        <a href="#" class="img-prod"><img class="img-fluid" src="../lib/img/images%20(1).jpg" alt="Colorlib Template"></a>-->
                    <!--                                        <div class="text py-3 px-3">-->
                    <!--                                            <h3><a href="#">Young Woman Wearing Dress</a></h3>-->
                    <!--                                            <div class="d-flex">-->
                    <!--                                                <div class="pricing">-->
                    <!--                                                    <p class="price"><span>$120.00</span></p>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="rating">-->
                    <!--                                                    <p class="text-right">-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                        <span class="ion-ios-star-outline"></span>-->
                    <!--                                                    </p>-->
                    <!--                                                </div>-->
                    <!--                                            </div>-->
                    <!--                                            <hr>-->
                    <!--                                            <p class="bottom-area d-flex">-->
                    <!--                                                <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>-->
                    <!--                                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>-->
                    <!--                                            </p>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </section>-->
                    <!---->
                    <!--                    <section class="ftco-section-parallax">-->
                    <!--                        <div class="parallax-img d-flex align-items-center">-->
                    <!--                            <div class="container">-->
                    <!--                                <div class="row d-flex justify-content-center py-5">-->
                    <!--                                    <div class="col-md-7 text-center heading-section ftco-animate">-->
                    <!--                                        <h1 class="big">Subscribe</h1>-->
                    <!--                                        <h2>Subcribe to our Newsletter</h2>-->
                    <!--                                        <div class="row d-flex justify-content-center mt-5">-->
                    <!--                                            <div class="col-md-8">-->
                    <!--                                                <form action="#" class="subscribe-form">-->
                    <!--                                                    <div class="form-group d-flex">-->
                    <!--                                                        <input type="text" class="form-control" placeholder="Enter email address">-->
                    <!--                                                        <input type="submit" value="Subscribe" class="submit px-3">-->
                    <!--                                                    </div>-->
                    <!--                                                </form>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </section>-->
                </div>
            </div>
        </div>
        <?php //include_once('elements/home_feature_right.php'); ?>
        <?php //include_once('elements/home_feature_left.php'); ?>
        <hr class="featurette-divider">
    </div>
    <?php  include_once('elements/footer.php'); ?>
</main>
    <?php include_once('elements/scripts.php'); ?>

</body>
</html>