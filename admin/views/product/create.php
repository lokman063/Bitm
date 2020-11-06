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
    <h1>Add a new Product</h1>
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

    <select class="custom-select" id="category_id" name="category_id" for="category_id">
    <option selected>Choose...</option>
    <?php
    foreach ($categories as $category) {
    ?>

    <option value="<?php echo $category['id'];?>"><?php echo $category['category_title'];?></option>

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
    <option selected>Choose...</option>
    <?php
    foreach ($brands as $brand) {
    ?>

    <option value="<?php echo $brand['id'];?>"><?php echo $brand['brand_title'];?></option>

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
      value=""
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
      value=""
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
      value=""
      type="text"
      name="description"
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
    </div>
    <!-- cost -->
    <div class="col-lg-6">
    <div class="form-group">
    <label for="cost">Cost </label>
    <input id="cost" 
    value="" 
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
    value="" 
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
    value="" 
    placeholder="type here"
    type="text"
    name="total_sales" class="form-control">
    </div>
    </div>




    <!-- Draft -->
    <div class="col-lg-6">
    <div class="form-group">
    <div class="form-check">
    <input class="form-check-input"  id="is_draft" value="1"  type="checkbox" name="is_draft">
    <label class="form-check-label" for="is_draft">
    Draft
    </label>
    </div>
    </div>

    <!-- Checkbox for active -->
    <div class="col-lg-6">
    <div class="form-group">
    <div class="form-check">
    <input class="form-check-input"  id="is_active" value="1" checked="checked" type="checkbox" name="is_active">
    <label class="form-check-label" for="is_active">
    Active
    </label>
    </div>
    </div>

    <!-- Checkbox for New -->

    <div class="form-group">
    <div class="form-check">
    <input class="form-check-input" value="1" checked="checked" type="checkbox" name="is_new" id="is_new">
    <label class="form-check-label" for="is_new">
    The Product is brand new
    </label>
    </div>
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