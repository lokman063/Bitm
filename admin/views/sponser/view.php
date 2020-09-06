<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

?>

<?php
ob_start();
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >sponser</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="../form.html" style="color: black">Add New</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <section >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm col-md-6 col-lg-3 ">
                                    <div class="sponser">
                                        <a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $sponser['picture']?>" alt="Colorlib Template">
                                            <span class="status">30%</span>
                                        </a>
                                        <div class="text ">
                                            <h3><a href="#"><?php echo $sponser['title']?></a></h3>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>



        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>