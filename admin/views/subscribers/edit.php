<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



//selection query
$query = 'SELECT * FROM `subscribers` WHERE id = '.$_GET['id'];
$sth = $conn->prepare($query);
$sth->execute();
$subscriber = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($sponser);
?>

<?php
ob_start();
?>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



        <form id="contact-form" method="post" action="update.php" role="form">
        <input id="id"  value="<?php echo $subscriber['id']?>"
               type="hidden" name="id" class="form-control">
        <div class="messages"></div>
        <h1>Edit</h1>
        <div class="controls">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">


                        &nbsp;
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email"
                                   value="<?php echo $subscriber['email']?>"
                                   type="text"
                                   name="email"
                                   placeholder="e.g.@mail.com" class="form-control"
                                   autofocus="autofocus";>

                            <div class="help-block text-muted">Enter Subscriber Email</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="is">Is_subscribed</label>
                            <input id="is_subscribed"
                                   value="<?php echo $subscriber['is_subscribed']?>"
                                   type="text"
                                   name="is_subscribed"
                                   placeholder="" class="form-control"
                                   autofocus="autofocus";>


                        </div>
                    </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="reason">reason_text:</label>
                            <input id="reason"
                                   value="<?php echo $subscriber['reason'];?>"
                                   type="text"
                                   name="reason"
                                   placeholder="" class="form-control"
                                   autofocus="autofocus";>
                        </div>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-success">Send & Save</a></button>

        </div>

        </form>
        </main>


<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>
