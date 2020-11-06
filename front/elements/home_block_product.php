<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Product\Product;

//selection query
$product = new Product(); 
$products = $product->index();


?>

<!-- Three columns of text below the carousel -->

<div class="row">
<?php
foreach($products as $product):
?>

    <div class=" d-flex flex-row col-lg-4">

                    <form action="<?=FRONT?>addtocart.php" method="post">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                            <input type="hidden" name="product_code" value="<?php echo $product['product_code'];?>">
                            <input type="hidden" name="mrp" value="<?php echo $product['mrp'];?>">
                            <input type="hidden" name="qty" value="1">
                        </div>

                            <div class="card" style="width: 14rem;  ">
                            <img src="<?=UPLOADS?><?=$product['product_picture'];?>"  class="img-thumbnail" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$product['product_title'];?></h5>
                                    <p class="card-text"><?=$product['short_description'];?></p>
                                    <p class="card-text"><?=$product['mrp'];?></p>
                                    <button class="btn btn-danger" type="submit")>add to cart</button>
                                </div>


                            </div>

                    
                    </form>

    </div>







<?php
endforeach;
?>
</div>