<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Product\Product;

 if (isset($_POST['search'])) {
    $product = new Product();
    $products = $product->search($_POST['search']);
 if(empty( $banners)){

    $searching = "The Banner not found. Please Try again";


 }
 }else {
    $product = new Product();
    $products = $product->index();
//    echo "<pre></pre>";
//    print_r( $products);
//    echo "</pre>";
//    die();
 }



?>

<?php
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
                <h1 >Product (Active)</h1>
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
                      
                    <table class="table table-sm">
  <thead>
    <tr>
     
    <th>product_picture</th>
   <th>product Title</th>
   <th>Category</th>
   <th>Brand</th>
 <th>Price(MRP)</th>
 <th>Product Status</th>
<th class="d-flex justify-content-sm-around">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php
            if($products){
            foreach($products as $product){
        ?>
                                    
    <tr>
    <td class="image-prod"><div class="img"><img src="<?=UPLOADS?><?php echo $product['product_picture']?>" width="40px" height="30px"> </div></td>
      <td>  <h6><a href="show.php?id=<?php echo $product['id'] ?>"><?php echo $product['product_title'];?></a></h6></td>
      
      <td>  <h6><a href="show.php?id=<?php echo $product['id'] ?>"><?php echo $product['category_title'];?></a></h6></td>
      
      <td>  <h6><a href="show.php?id=<?php echo $product['id'] ?>"><?php echo $product['brand_title'];?></a></h6></td>
       <td class="product-price">
                                            <?php
                                            if($product['special_price'] > 0){
                                                echo "<strike>".$product['mrp']."</strike>";

                                            }else{
                                                echo $product['mrp'];
                                            }
                                            ?></td>
                                              <td class="product-price">
                                            <?php
                                            if($product['is_active']= 1){
                                                echo "Active Product";
                                              
                                            }else{
                                                echo "Inactive Product";
                                            }
                                            ?>

                                        </td>
      <td class="d-flex justify-content-sm-around" > 
                                       
                                       <div class="d-flex justify-content-center">
                                       <a type="button"data-toggle="tooltip" data-placement="top" title="Edit the Product" class="btn btn-primary btn-sm" href="<?=VIEW?>product/edit.php?id=<?php echo $product['id']?>"><i class="fas fa-edit"></i></a>
                                       </div>
                                       
                                       <div class="d-flex justify-content-center">
                                       <form action="<?=VIEW?>product/softdelete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                                                <button data-toggle="tooltip" data-placement="top" title="Delete the product from list" class=" btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"></i></button>
                                       
                                        </form>
                                       </div>
                                       
                                       <div class="d-flex justify-content-center">
                                       <a type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Click to inactive the product" href="<?=VIEW?>product/deactivate.php?id=<?php echo $product['id']?>"><i class="fas fa-toggle-off"></i></a>
                                       </div>
                                       <div class="d-flex justify-content-center">
                                       <a type="button" data-toggle="tooltip" data-placement="top" title="Click to draft the product" class="btn btn-primary btn-sm" href="<?=VIEW?>product/drafting.php?id=<?php echo $product['id']?>"><i class="fab fa-draft2digital"></i></a>
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


