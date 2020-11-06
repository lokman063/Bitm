
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Brand\Brand;
$brand = new Brand();
$brand = $brand->show($_GET['id']);



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



    <form id="brand-entry-form" method="post"
          action="update.php"
          enctype="multipart/form-data"
          role="form">
        <div class="messages"></div>
        <h1>Edit Brand</h1>
        <div class="controls">
            <div class="row">
                <input id="id"  value="<?php echo $brand['id']?>" type="hidden" name="id" class="form-control">
                <input id="id"  value="<?php echo $brand['brand_picture']?>" type="hidden" name="pre_brand_picture" class="form-control">

            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="brand_title">Enter Brand Name</label>
                    <input id="brand_title"
                           value="<?php echo $brand['brand_title']?>"
                           type="text"
                           name="brand_title"
                           placeholder="e.g. Bashundhara "
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter Brand Name</div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="brand_link">Enter brand_link Name</label>
                    <input id="brand_link"
                           value="<?php echo $brand['brand_link']?>"
                           type="text"
                           name="brand_link"
                           placeholder="e.g. Bashundhara "
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter brand_link </div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="brand_picture">brand_picture</label>
                    <input id="brand_picture"  value="" type="file" name="brand_picture" class="form-control">
                    <div class="help-block with-errors"></div>
                </div>
                <?php
                if(!empty($brand['brand_picture'])){
                    ?>
                    <img class="img-fluid"
                         src="<?=UPLOADS;?><?php echo $brand['brand_picture']?>" alt="<?php echo $brand['brand_title']?>">
                    <?php
                }else{
                    ?>
                    <div>No Image is available. Please upload one</div>
                    <?php
                }
                ?>

            </div>

            <?php
            $checked = '';
            if($brand['is_active']){
                $checked = 'checked="checked"';
            }
            ?>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="is_active">Active</label>
                    <input id="is_active" <?=$checked?> value="1" type="checkbox" name="is_active" class="form-control">
                    <div class="help-block with-errors"></div>
                </div>
            </div>


            <button type="submit" class="btn btn-success">
                Send & Save Brand
            </button>


        </div>

    </form>
</main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>
</html>