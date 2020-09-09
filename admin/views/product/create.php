<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Category\Category;
use Bitm\Brand\Brand;

$brand = new Brand();
$brands = $brand->all();

$category = new Category();
$categories = $category->all();

ob_start();
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <form id="product-entry-form"
                  method="post"
                  action="store.php"
                  enctype="multipart/form-data"
                  role="form">
                <div class="messages"></div>
<h1>ADD NEW</h1>
                <div class="controls">
                    <div class="row">
                        <div class="col-lg-6">
                           &nbsp;
                        </div>
                        <div class="col-lg-6">


                        </div>
<!-- category name id -->
<div class="col-lg-6">
 <div class="form-group">
    <label  for="inputGroupSelect01">Category Name</label>
 
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <?php
    foreach ($categories as $category) {
        ?>

<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>

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
 
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <?php
    foreach ($brands as $brand) {
        ?>

<option value="<?php echo $brand['id'];?>"><?php echo $brand['title'];?></option>

        <?php
    }
    ?>
   
   
  </select>
  <div class="help-block with-errors"></div>
                           </div>
  
</div>
                       
           <!--product title   -->   
           <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Enter Product Title</label>
                                <input id="title"
                                       value=""
                                       type="text"
                                       name="title"
                                       placeholder="type here"
                                       autofocus="autofocus"
                                       class="form-control">
                                 <div class="help-block with-errors"></div>
                            </div>
                        </div>           
                        
            <!-- product picture -->
            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input id="picture" 
                                 value=""
                                 type="file" 
                                 name="picture" 
                                  placeholder="type here"
                                 class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>
                         </div>
                 <!-- MRP -->
                     

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="mrp">MRP</label>
                                <input id="mrp" 
                                 value="" 
                                 placeholder="type here"
                                type="text"
                                 name="mrp" class="form-control">
                             
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