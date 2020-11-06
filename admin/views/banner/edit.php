<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Banner\Banner;

//selection query
$banner = new Banner();
$banners = $banner->show($_GET['id']);


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
                <input id="id"  value="<?php echo $banners['id']?>" type="text" name="id" class="form-control">
                <input id="id"  value="<?php echo $banners['picture']?>" type="hidden" name="pre_picture" class="form-control">

            </div>

            <div class="col-lg-8">
                <div class="form-group">
                    <label for="title">Enter Product Title</label>
                    <input id="title"
                           value="<?php echo $banners['title']?>"
                           type="text"
                           name="title"
                           placeholder="e.g. Bashundhara Tissue"
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter Product Title</div>
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
           if(!empty($banners['picture'])){
               ?>
               <div><img class="col-3" src="<?=UPLOADS;?><?php echo $banners['picture']?>"  alt="<?php echo $banners['title']?>"></div>
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


    <label for="link">Link</label>
    <input id="link"  value="<?php echo $banners['link']?>" type="text" name="link" class="form-control">
    <div class="help-block with-errors"></div>
    </div>
    </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="promotional_message"><h4>Promotional Message</h4></label>
                    <input id="promotional_message"  value="<?php echo $banners['promotional_message']?>" type="text" name="promotional_message" class="form-control">
                    <div class="help-block text-muted">Enter the promotional message</div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <?php

if ($banners['is_active']){
$checked = 'checked="checked"';
}
else{
$checked = '';
}
?>


<div class="col-lg-6">
<div class="form-group">
<label for="is_active">is_active</label>
<input  id="is_active" <?=$checked?>  value="" type="checkbox" name="is_active" class="form-control">
<div class="help-block with-errors"></div>
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
