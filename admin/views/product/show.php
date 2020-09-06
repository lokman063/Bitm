<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$id = $_GET['id'];
$query = 'SELECT * FROM products WHERE id = :id';
$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();
$product = $sth->fetch(PDO::FETCH_ASSOC);
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
                        <a href="<?=VIEW;?>product/index.php" style="color: black">Go to list</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">

                            <div class="row">
                                <div class="col-sm col-md-6 col-lg-3 ">
                                    <div class="product">
                                        <a href="#" class="img-prod"><img class="img-fluid" src="<?=UPLOADS;?><?php echo $product['picture']?>" alt="<?php echo $product['title']?>">
                                            <span class="status">30%</span>
                                        </a>
                                        <div class="text ">
                                            <h3><a href="#"><?php echo $product['title']?></a></h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    <span class="price-sale">$<?php echo $product['mrp']?></span>
                                                    <span class="price-sale">$<?php echo $product['special_price']?></span>
                                                    </p>
                                                </div>
                                                <?php echo $product['short_description']?>
                                                <?php echo $product['description']?>
                                                <?php
                                                if($product['is_active']){
                                                   echo "The product is active";
                                                }else{
                                                    echo "The product is not active";
                                                }

?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
         
                </div>
            </div>



        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>