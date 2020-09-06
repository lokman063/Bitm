<?php
use Bitm\Utility\Utility;
use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$id = $_GET['id'];
$query = 'SELECT * FROM contacts WHERE id = :id';
$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$sth->execute();

$contacts = $sth->fetch(PDO::FETCH_ASSOC);

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
        <h1>Edit Contact</h1>
        <div class="controls">
            <div class="row">
                <input id="id"  value="<?php echo $contacts['id']?>" type="hidden" name="id" class="form-control">

            </div>
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="brand_id">brand_id</label>-->
            <!--                                <input id="brand_id"  value="" type="text" name="brand_id" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="label_id">label_id</label>-->
            <!--                                <input id="label_id"  value="" type="text" name="label_id" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="name">Enter The Name</label>
                    <input id="name"
                           value="<?php echo $contacts['name']?>"
                           type="text"
                           name="name"
                           placeholder="e. g . Abdul Karim"
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter The Name</div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <label for="link">Link</label>-->
<!--                <input id="link"-->
<!--                   -->
<!--                       type="text"-->
<!--                       name="link"-->
<!--                       placeholder="write down email"-->
<!--                       value="--><?php //echo $contacts['link']?><!--"-->
<!--                       class="form-control">-->
<!--                <div class="help-block text-muted">Link</div>-->
<!--                <div class="help-block with-errors"></div>-->
<!--            </div>-->

<!--            <div class="col-lg-6">-->
<!--                <div class="form-group">-->
<!--                    <label for="picture">Picture</label>-->
<!--                    <input id="picture"  value="" type="file" name="picture" class="form-control">-->
<!--                    <div class="help-block with-errors"></div>-->
<!--                </div>-->
<!--            </div>-->

<!--           --><?php
//
//
//           //for showing picture or no showing
//           if(!empty($contacts['picture'])){
//               ?>
<!--               <div><img class="col-3" src="--><?//=UPLOADS;?><!----><?php //echo $contacts['picture']?><!--" " alt="--><?php //echo $contacts['title']?><!--"></div>-->
<!--            --><?php
//           } else{
//               ?>
<!--               <div>No picture avialabe</div>-->
<!--               --><?php
//           }
//           ?>



            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input id="email"  value="<?php echo $contacts['email']?>"" type="text" name="email" class="form-control">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input id="subject"  value="<?php echo $contacts['subject']?>"" type="text" name="subject" class="form-control">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

<!--                                  <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="description">description</label>-->
            <!--                                <input id="description"  value="" type="text" name="description" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="total_sales">total_sales</label>-->
            <!--                                <input id="total_sales"  value="" type="text" name="total_sales" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="product_type">product_type</label>-->
            <!--                                <input id="product_type"  value="" type="text" name="product_type" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="is_new">is_new</label>-->
            <!--                                <input id="is_new"  value="" type="text" name="is_new" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="cost">cost</label>-->
            <!--                                <input id="cost"  value="" type="text" name="cost" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="mrp">mrp</label>-->
            <!--                                <input id="mrp"  value="" type="text" name="mrp" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="special_price">special_price</label>-->
            <!--                                <input id="special_price"  value="" type="text" name="special_price" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="soft_delete">soft_delete</label>-->
            <!--                                <input id="soft_delete"  value="" type="text" name="soft_delete" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="is_draft">is_draft</label>-->
            <!--                                <input id="is_draft"  value="" type="text" name="is_draft" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="is_active">is_active</label>-->
            <!--                                <input id="is_active"  value="" type="text" name="is_active" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="created_at">created_at</label>-->
            <!--                                <input id="created_at"  value="" type="text" name="created_at" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="col-lg-6">-->
            <!--                            <div class="form-group">-->
            <!--                                <label for="modified_at">modified_at</label>-->
            <!--                                <input id="modified_at"  value="" type="text" name="modified_at" class="form-control">-->
            <!--                                <div class="help-block with-errors"></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->

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
