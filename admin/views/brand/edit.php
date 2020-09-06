
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
                <input id="id"  value="<?php echo $brand['picture']?>" type="hidden" name="pre_picture" class="form-control">

            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="title">Enter Brand Name</label>
                    <input id="title"
                           value="<?php echo $brand['title']?>"
                           type="text"
                           name="title"
                           placeholder="e.g. Bashundhara "
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter Brand Name</div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input id="picture"  value="" type="file" name="picture" class="form-control">
                    <div class="help-block with-errors"></div>
                </div>
                <?php
                if(!empty($brand['picture'])){
                    ?>
                    <img class="img-fluid"
                         src="<?=UPLOADS;?><?php echo $brand['picture']?>" alt="<?php echo $brand['title']?>">
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