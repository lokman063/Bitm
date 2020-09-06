<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Utility;
use Bitm\Utility\Message;

//selection query
$id = $_GET['id'];
$query = 'SELECT * FROM carts WHERE id = :id';
$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();

$carts = $sth->fetch(PDO::FETCH_ASSOC);

?>

<?php
ob_start();
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <?php
    if($message = Message::get()){
        ?>
        <div class="alert alert-success">
            <?php echo $message;?>
        </div>
        <?php
    }
    ?>



    <form id="product-entry-form" enctype="multipart/form-data" method="post" action="update.php" role="form">
        <div class="messages"></div>
        <h1>Edit Product</h1>
        <div class="controls">
            <div class="row">
                <input id="id"  value="<?php echo $carts['id']?>" type="hidden" name="id" class="form-control">
                <input id="id"  value="<?php echo $carts['picture']?>" type="hidden" name="pre_picture" class="form-control">


        </div>

        <div class="col-lg-8">
            <div class="form-group">
                <label for="product_title"><h4>product Title</h4></label>
                <input id="product_title"  value="" type="text" name="product_title" class="form-control">
                <div class="help-block text-muted">Type The product Title</div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <label for="product_id"><h4>Product Id</h4></label>
                <input id="product_id"
                       value="<?php echo $carts['product_id']?>"
                       type="text"
                       name="product_id"
                       placeholder="Write down cart title"
                       autofocus="autofocus"
                       class="form-control">
                <div class="help-block text-muted">Enter Product id</div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="picture">Picture</label>
                <input id="picture"  value="" type="file" name="picture" class="form-control">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <?php


        //for showing picture or no showing
        if(!empty($carts['picture'])){
            ?>
            <div><img class="col-3" src="<?=UPLOADS;?><?php echo $carts['picture']?>" " alt="<?php echo $carts['product_title']?>"></div>
            <?php
        } else{
            ?>
            <div>No picture avialabe</div>
            <?php
        }
        ?>
        &nbsp;

        <div class="col-lg-8">
            <div class="form-group">
                <label for="qty"><h4>Qunatity</h4></label>
                <input id="qty"  value="<?php echo $carts['qty']?>" type="text" name="qty" class="form-control">
                <div class="help-block text-muted">Enter the Qunatity</div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <label for="unite_price"><h4>Price </h4></label>
                <input id="unite_price"  value="<?php echo $carts['unite_price']?>" type="text" name="unite_price" class="form-control">
                <div class="help-block text-muted">Enter the price</div>
                <div class="help-block with-errors"></div>
            </div>
        </div>



        <div class="col-lg-6">
            <button type="submit" class="btn btn-success">
                Save cart
            </button>


        </div>

    </form>
</main>

<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>


