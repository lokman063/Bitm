
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
?>
<?php
ob_start();
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



            <form id="product-entry-form" method="post" action="store.php" role="form">

                <div class="messages"></div>
                <h1>ADD NEW</h1>
                <div class="controls">
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="name">Enter Name</label>
                                <input id="name"
                                       value=""
                                       type="text"
                                       name="name"
                                       placeholder=""
                                       autofocus="autofocus"
                                       class="form-control">
                                <div class="help-block text-muted">Name</div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="body">Enter Body</label>
                                <input id="body"
                                       value=""
                                       type="text"
                                       name="body"
                                       placeholder=""
                                       autofocus="autofocus"
                                       class="form-control">
                                <div class="help-block text-muted">Body</div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="picture">Upload Picture</label>
                                <input id="picture"
                                       value=""
                                       type="text"
                                       name="picture"
                                       placeholder=""
                                       autofocus="autofocus"
                                       class="form-control">
                                <div class="help-block text-muted">Upload Piture</div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                            </div>

                        <button type="submit" class="btn btn-success">
                            Send & Save Testimonial
                        </button>


                    </div>

            </form>
        </main>
        <?php
        $pagecontent = ob_get_contents();
        ob_end_clean();
        echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
        ?>
