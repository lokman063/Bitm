<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

?>

<?php
ob_start();
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



        <form id="product-entry-form" enctype="multipart/form-data" method="post" action="store.php" role="form">

            <div class="messages"></div>
            <h1>Add A New Banner</h1>
            <div class="controls">


                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="title"><h4>Title</h4></label>
                            <input id="title"
                                   value=""
                                   type="text"
                                   name="title"
                                   placeholder="Write down banner title"
                                   autofocus="autofocus"
                                   class="form-control">
                            <div class="help-block text-muted">Enter Banner Title</div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="picture"><h4>Picture</h4></label>
                                                    <input id="picture"  value="" type="file" name="picture" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="link"><h4>Link</h4></label>
                                                    <input id="link"  value="" type="text" name="link" class="form-control">
                                                    <div class="help-block text-muted">Type The Link</div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="promotional_message"><h4>Promotional Message</h4></label>
                                                    <input id="promotional_message"  value="" type="text" name="promotional_message" class="form-control">
                                                    <div class="help-block text-muted">Enter the promotional message</div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="is_active">Active</label>
                                                    <input id="is_active"  value="1" checked="checked"  type="checkbox" name="is_active" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


<div class="col-lg-6">
                    <button type="submit" class="btn btn-success">
                        Save Banner
                    </button>


                </div>

        </form>
    </main>

<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>