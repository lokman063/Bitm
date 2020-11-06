<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

use Bitm\Product\Product;
use Bitm\Utility\Utility;


$product = new Product();
$products = $product->index();


?>
<!doctype html>
<html lang="en">
<?php include_once('elements/head.php'); ?>
<body>
<?php include_once('elements/header.php'); ?>
<main role="main">

     <div class="container marketing d-flex">
         <?php
            foreach($products as $product):
            ?>
        <div class="row col-lg-4">
            
            <form action="<?=FRONT?>addtocart.php" method="post">
                <div>
                    <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                    <input type="hidden" name="product_code" value="<?php echo $product['product_code'];?>">
                    <input type="hidden" name="qty" value="1">
                </div>
                <div class="col-lg-4">






                    <div class="card" style="width: 18rem;">
                        <img src="<?=UPLOADS?><?=$product['product_picture'];?>" class="card-img-top" >
                        <div class="card-body">
                            <h5 class="card-title"><?=$product['product_title'];?></h5>
                            <p class="card-text"><?=$product['short_description'];?></p>
                            <p class="card-text"><?=$product['mrp'];?></p>


                            <button class="btn btn-danger" type="submit">add to cart</button>
                        </div>

                        </td>
                    </div>

                </div>

        </div>
         </form></td>
         <?php
         endforeach;
         ?>
        </div>

        <hr class="featurette-divider">

    <?php include_once('elements/footer.php'); ?>
</main>

</body>
</html>