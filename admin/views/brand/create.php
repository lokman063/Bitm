<?php



include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
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
        <form id="brand-entry-form"
              method="post"
              action="store.php"
              enctype="multipart/form-data"
              role="form">
            <div class="messages"></div>
            <h1>ADD NEW</h1>
            <div class="controls">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="brand_title">Enter Brand brand_title</label>
                            <input id="brand_title"
                                   value=""
                                   type="text"
                                   name="brand_title"
                                   placeholder="brand_title here "
                                   autofocus="autofocus"
                                   class="form-control">
                            <div class="help-block text-muted">Enter Brand Title</div>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="brand_link">Enter Brand brand_link</label>
                            <input id="brand_link"
                                   value=""
                                   type="text"
                                   name="brand_link"
                                   placeholder="brand_link here "
                                   autofocus="autofocus"
                                   class="form-control">
                            <div class="help-block text-muted">Enter Brand Title</div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="brand_picture">brand_picture</label>
                            <input id="brand_picture"  value="" type="file" name="brand_picture" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <input id="is_active" checked="checked" value="1" type="checkbox" name="is_active" class="form-control">
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