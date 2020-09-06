<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
$id = $_GET['id'];
$query = 'SELECT * FROM sponsers WHERE id = :id';
$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();

$sponser = $sth->fetch(PDO::FETCH_ASSOC);
?>

<?php
ob_start();
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



            <form id="sponser-entry-form" method="post" action="update.php" role="form">
                 <div class="messages"></div>
<h1>Edit Product</h1>
                <div class="controls">
                    <div class="row">
                        <input id="id"  value="<?php echo $sponser['id']?>" type="hidden" name="id" class="form-control">

                    </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="title">Enter sponser Title</label>
                                <input id="title"
                                       value="<?php echo $sponser['title']?>"
                                       type="text"
                                       name="title"
                                       placeholder="e.g."
                                       autofocus="autofocus"
                                       class="form-control">
                                <div class="help-block text-muted">Enter sponser Title</div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="picture">picture</label>
                                <input id="picture"  value="" type="file" name="picture" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>
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
