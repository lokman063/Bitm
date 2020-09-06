
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

//selection query
$query = 'SELECT * FROM `testimonials` WHERE id = '.$_GET['id'];
$sth = $conn->prepare($query);
$sth->execute();

$testimonials = $sth->fetch(PDO::FETCH_ASSOC);

?>

<?php
ob_start();
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



            <form id="product-entry-form" method="post" action="update.php" role="form">
                <input id="id"  value="<?php echo $testimonials['id']?>" type="hidden" name="id" class="form-control">
                <div class="messages"></div>
                <h1>Edit Testimonial</h1>
                <div class="controls">
                    <div class="row">



                    <div class="col-lg-6">


                        <div class="form-group">
                            <label for="name">Enter Name</label>
                            <input id="name"
                                   value="<?php echo $testimonials['name']?>"
                                   type="text"
                                   name="name"
                                   placeholder=""
                                   autofocus="autofocus"
                                   class="form-control">
                            <div class="help-block text-muted">Enter Name</div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="body">Enter Body</label>
                            <input id="body"
                                   value="<?php echo $testimonials['body']?>"
                                   type="text"
                                   name="body"
                                   placeholder=""
                                   autofocus="autofocus"
                                   class="form-control">
                            <div class="help-block text-muted">Enter Body</div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="title">Upload Picture</label>
                            <input id="title"
                                   value="<?php echo $testimonials['picture']?>"
                                   type="file"
                                   name="title"
                                   placeholder=""
                                   autofocus="autofocus"
                                   class="form-control">
                            <div class="help-block text-muted">Upload Picture</div>
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
