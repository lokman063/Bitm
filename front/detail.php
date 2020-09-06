<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

use Bitm\Product\Product;
use Bitm\Utility\Utility;
$query = "SELECT * FROM products ORDER BY id DESC";
$sth = $conn->prepare($query);
$sth->execute();
$newproducts = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
foreach($newproducts as $product):
?>
<!doctype html>
<html lang="en">
<?php include_once('elements/head.php'); ?>
<body>
<?php include_once('elements/header.php'); ?>
<main role="main">
    <form method="post" action="addtocart.php">
     <div class="container marketing">
        <div class="row">
            <div class="card mb-3" >
                <div class="row no-gutters">

                    <div class="col-md-4">
                        <img src="<?=UPLOADS;?><?=$product['picture']?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?=$product['id']?>" />
                            <h5 class="card-title"><?=$product['title']?></h5>
                            <?php
                            //setlocale(LC_MONETARY,"bd_BD");
                            //echo money_format("%.2n", $input);
                            ?>
                            <p class="card-text">BDT.&nbsp;<?=$product['mrp'];?> <?=$product['special_price']?></p>
                            <input type="number" name="qty" value="1" />
                            <p class="card-text"><?=$product['short_description']?></p>
                            <p class="card-text"><?=$product['description']?></p>
                            

                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php //include_once('elements/home_feature_right.php'); ?>
        <?php //include_once('elements/home_feature_left.php'); ?>
        <hr class="featurette-divider">
    </div>
    <?php include_once('elements/footer.php'); ?>
    </form>
</main>
<?php include_once('elements/scripts.php'); ?>
</body>
</html>
<?php
endforeach;
?>