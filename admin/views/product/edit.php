<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Product\Product;
use Bitm\Brand\Brand;
use Bitm\Category\Category;

$product = new Product();
$product = $product->show($_GET['id']);

$brand = new Brand();
$brands = $brand->all();

$category = new Category();
$categories = $category->all();



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

<form id="product-entry-form" method="post"
action="update.php"
enctype="multipart/form-data"
role="form">
<div class="messages"></div>
<h1>Edit Product</h1>
<div class="controls">
<div class="row">
<input id="id"  value="<?php echo $product['id']?>" type="hidden" name="id" class="form-control">
<input id="id"  value="<?php echo $product['product_picture']?>" type="hidden" name="pre_picture" class="form-control">


<!-- category name id -->
<div class="col-lg-6">
<div class="form-group">
<label  for="inputGroupSelect01">Category Name</label>

<select class="custom-select" id="category_id" name="category_id" for="category_id">
<option >Choose...</option>

<?php
foreach ($categories as $category) {
?>



<option <?php if($product['category_id']==$category['id']){ echo "selected" ;} ?> value="<?php echo $category['id'];?>"><?php echo $category['category_title'];?></option>

<?php
}
?>


</select>
<div class="help-block with-errors"></div>
</div>

</div>

<!--brand name  -->

<div class="col-lg-6">
<div class="form-group">
<label  for="inputGroupSelect01">Brand Name</label>

<select class="custom-select" id="brand_id" name="brand_id" for="brand_id">
<option >Choose...</option>
<?php
foreach ($brands as $brand) {
?>

<option <?php if($product['brand_id']==$brand['id']){ echo "selected" ;} ?> value="<?php echo $brand['id'];?>"><?php echo $brand['brand_title'];?></option>

<?php
}
?>


</select>
<div class="help-block with-errors"></div>
</div>

</div>

<!--product product_title   -->   
<div class="col-lg-6">
<div class="form-group">
<label for="product_title">Enter Product Title</label>
<input id="product_title"
  value="<?=$product['product_title'];?>"
  type="text"
  name="product_title"
  placeholder="type here"
  autofocus="autofocus"
  class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>           


<!--product short Descrption  -->   
<div class="col-lg-6">
<div class="form-group">
<label for="short_description">Short Description</label>
<input id="short_description"
  value="<?=$product['short_description'];?>"
  type="text"
  name="short_description"
  placeholder="type here"
  autofocus="autofocus"
  class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>           


<!--product description  -->   
<div class="col-lg-6">
<div class="form-group">
<label for="description">Description</label>
<input id="description"
  value="<?=$product['description'];?>"
  type="text"
  name="description"
  placeholder="type here"
  autofocus="autofocus"
  class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>           

<!-- product picture -->
<div class="col-lg-4">
<div class="form-group">
<label for="picture">Picture</label>
<input id="picture"  value="" type="file" name="picture" class="form-control">
<div class="help-block with-errors"></div>
<div class="">
<?php


//for showing picture or no showing
if(!empty($product['product_picture'])){
?>
<div><img class="col-3" src="<?=UPLOADS;?><?php echo $product['product_picture']?>"  alt="<?php echo $product['product_title']?>"></div>
<?php
} else{
?>
<div>No picture avialabe</div>
<?php
}
?>

</div>
</div>
</div>


&nbsp;


<!-- MRP -->
<div class="col-lg-6">
<div class="form-group">
<label for="mrp">MRP</label>
<input id="mrp" 
value="<?=$product['mrp'];?>" 
placeholder="type here"
type="text"
name="mrp" class="form-control">
</div>
</div>
<!-- cost -->
<div class="col-lg-6">
<div class="form-group">
<label for="cost">Cost </label>
<input id="cost" 
value="<?=$product['cost'];?>" 
placeholder="type here"
type="text"
name="cost" class="form-control">
</div>
</div>
<!-- Speacial Price -->
<div class="col-lg-6">
<div class="form-group">
<label for="special_price">Special Price</label>
<input id="special_price" 
value="<?=$product['special_price'];?>" 
placeholder="type here"
type="text"
name="special_price" class="form-control">
</div>
</div>

<!-- Total Sales -->
<div class="col-lg-6">
<div class="form-group">
<label for="total_sales">Total Sales</label>
<input id="total_sales" 
value="<?=$product['total_sales'];?>" 
placeholder="type here"
type="text"
name="total_sales" class="form-control">
</div>
</div>




<!-- Draft -->
<?php

$checked = '';
if($product['is_draft']){
$checked = 'checked="checked"';
}
?>

<div class="col-lg-6">
<div class="form-group">
<div class="form-check">
<input class="form-check-input"  id="is_draft" value=" " <?=$checked?> type="checkbox" name="is_draft">
<label class="form-check-label" for="is_draft">
Draft
</label>
</div>
</div>

<!-- Checkbox for active -->
<?php

$checked = '';
if($product['is_active']){
$checked = 'checked="checked"';
}
?>

<div class="col-lg-6">
<div class="form-group">
<div class="form-check">
<input class="form-check-input"  id="is_active" value=" " <?=$checked?> type="checkbox" name="is_active">
<label class="form-check-label" for="is_active">
Active
</label>
</div>
</div>

<!-- Checkbox for New -->
<?php

$checked = '';
if($product['is_new']){
$checked = 'checked="checked"';
}
?>

<div class="form-group">
<div class="form-check">
<input class="form-check-input" value=" " <?=$checked?> type="checkbox" name="is_new" id="is_new">
<label class="form-check-label" for="is_new">
The Product is brand new
</label>
</div>
</div>










<button type="submit" class="btn btn-success">
Send & Save Product
</button>


</div>

</form>
</main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>
