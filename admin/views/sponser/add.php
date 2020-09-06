<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

?>

<?php
ob_start();
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



            <form id="sponsers-entry-form" method="post" action="store.php" role="form">

                <div class="messages"></div>
                <h1>ADD NEW</h1>
                <div class="controls">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="title">Enter sponser name</label>
                                <input id="title"
                                       value=""
                                       type="text"
                                       name="title"
                                       placeholder="e.g.  "
                                       autofocus="autofocus"
                                       class="form-control">
                                <div class="help-block text-muted">Enter sponser name</div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
<!--                        <div class="col-lg-12">-->
<!--                                               <div class="form-group">-->
<!--                                                        <label for="picture">picture</label>-->
<!--                                                        <input id="picture"  value="" type="file" name="picture" class="form-control">-->
<!--                                                        <div class="help-block with-errors"></div>-->
<!--                                                    </div>-->
<!--                                               </div>-->



                                            </div>

                        <button type="submit" class="btn btn-success">
                             Save
                        </button>


                    </div>

            </form>
        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>
