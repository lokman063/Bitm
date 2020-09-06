<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$query = "SELECT * FROM products WHERE is_active = 1 ORDER BY id DESC";
$sth = $conn->prepare($query);
$sth->execute();
$products = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
ob_start();
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >Product</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>product/active.php" style="color: black">Active Products</a>
                        | <a href="<?=VIEW;?>product/inactive.php" style="color: black">In active Products</a>
                        | <a href="<?=VIEW;?>product/create.php" style="color: black">Add New</a>
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
                                <th>Title</th>
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
                                                <img src="<?=UPLOADS?><?php echo $product['picture']?>" 
                                                     width="140px" height="120px">
                                            </div></td>

                                        <td class="product-name">
                                            <h3><a href="show.php?id=<?php echo $product['id'] ?>"><?php echo $product['title'];?></a></h3>
                                            <p><?php echo $product['brand'];?> <?php echo $product['category'];?></p>
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
                                        <td> <a href="<?=VIEW?>product/edit.php?id=<?php echo $product['id']?>">Edit</a>
                                            | <a href="<?=VIEW?>product/delete.php?id=<?php echo $product['id']?>">Delete</a>
                                            | <a href="<?=VIEW?>product/deactivate.php?id=<?php echo $product['id']?>">Deactivate</a>
                                        </td>
                                    </tr>
                                <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no active product available. <a href="inactive.php">Click Here</a> to see deactive product.
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


