<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Product\Product;


//selection query
$product = new Product();
$products = $product->inactive();

ob_start();
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php
    if($message = Message::get()){
        ?>
        <div  class="alert alert-success">
            <?php echo $message;?>
        </div>
        <?php
    }
    ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >Inactive Product</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>product/create.php" style="color: black">Add New Product</a>
                        | <a href="<?=VIEW;?>product/inactive.php" style="color: black">Inactive Products</a>
                        | <a href="<?=VIEW;?>product/trash.php" style="color: black">Trash Box</a>
                        | <a href="<?=VIEW;?>product/draft.php" style="color: black">Draft </a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Picture</th>
                                <th>product_title</th>
                                <th>Price(MRP)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                            if($products){
                                foreach($products as $product){
                                    ?>
                                    <tr class="text-center">
                                        <td class="product-sl">&nbsp;</td>

                                        <td class="image-prod"><div class="img">
                                                <img src="<?=UPLOADS?><?php echo $product['product_picture']?>" 
                                                     width="70px" height="50px">
                                            </div></td>

                                        <td class="product-name">
                                            <h6><a href="show.php?id=<?php echo $product['id'] ?>"><?php echo $product['product_title'];?></a></h6>
                                            <p><?php echo $product['brand_title'];?> <?php echo $product['category_title'];?></p>
                                        </td>
                                        <td class="product-price">
                                            <?php
                                            if($product['special_price'] > 0){
                                                echo "<strike>".$product['mrp']."</strike>";
                                                echo $product['special_price'];

                                            }else{
                                                echo $product['mrp'];
                                            }
                                            ?>

                                        </td>
                                        <td class="d-flex justify-content-sm-around" > 
                                       
                                       <div class="d-flex justify-content-center">
                                       <a type="button" class="btn btn-primary btn-sm" href="<?=VIEW?>product/edit.php?id=<?php echo $product['id']?>"><i class="fas fa-edit"></i></a>
                                       </div>
                                       
                                       <div class="d-flex justify-content-center">
                                       <form action="<?=VIEW?>product/delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                                                <button class=" btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"></i></button>
                                       
                                        </form>
                                       </div>
                                       
                                       <div class="d-flex justify-content-center">
                                       <a type="button" class="btn btn-primary btn-sm" href="<?=VIEW?>product/activate.php?id=<?php echo $product['id']?>"><i class="fas fa-snowboarding"></i></a>
                                       </div>
                                        </td>
                                    </tr>
                                <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no product available. <a href="create.php">Click Here</a> to add a product.
                                    </td>
                                </tr>
                                <?php
                            }
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>


