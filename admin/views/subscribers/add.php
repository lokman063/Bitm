<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

?>

<?php
ob_start();
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



    <form id="contact-form" method="post" action="store.php" role="form">

        <div class="messages"></div>
        <h1>ADD NEW</h1>
        <div class="controls">
            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input id="email"
                               value=""
                               type="email"
                               name="email"
                               placeholder="e.g.@mail.com" class="form-control"
                               autofocus="autofocus";>

                        <div class="help-block text-muted">Enter email</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="is_subscribed">Is_subscribed</label>
                        <input id="is_subscribed"
                               value=""
                               type="text"
                               name="is_subscribed"
                               placeholder="" class="form-control"
                               autofocus="autofocus";>


                    </div>
                </div>

                </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="reason">reason_text:</label>
                        <input id="reason"
                               value=""
                               type="text"
                               name="reason"
                               placeholder="" class="form-control"
                               autofocus="autofocus";>
                    </div>
                </div>

        <button type="submit" class="btn btn-success">
            Send & Save Product
        </button>
            </div>

        </div>



    </form>
</main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>

