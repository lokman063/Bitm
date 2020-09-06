<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

?>
<!doctype html>
<html lang="en">
<?php include_once('elements/head.php'); ?>
<body>
<?php include_once('elements/header.php'); ?>
<main role="main">
    <?php include_once('elements/slider.php'); ?>
    <div class="col-1"> <u><h2>Product</h2></u></div>
     <div class="container marketing">
        <div class="row">
            <?php include_once('elements/home_block_product.php'); ?>
        </div>
        <?php include_once('elements/home_feature_right.php'); ?>
        <?php include_once('elements/home_feature_left.php'); ?>
        <hr class="featurette-divider">
    </div>
    <?php include_once('elements/footer.php'); ?>
</main>
<?php include_once('elements/scripts.php'); ?>
</body>
</html>