<?php
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$query = "SELECT * FROM products ORDER BY id DESC";
$sth = $conn->prepare($query);
$sth->execute();
$products = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<?php

foreach($products as $product):
?>
<div class="col-lg-4">
    <div class="card" style="width: 18rem;">
        <input id="id"  value="<?php echo $product['id']?>" type="hidden" name="id" >
        <img src="<?=UPLOADS?><?=$product['picture'];?>" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title"><?=$product['title'];?></h5>
            <p class="card-text"><?=$product['short_description'];?></p>
            <a href="addToCart.php" class="btn btn-primary">Add To Cart</a>
        </div>
    </div>

</div>
<?php
endforeach;
?>

