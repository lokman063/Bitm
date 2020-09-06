<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");



//selection query
$query = 'SELECT * FROM `subscribers` WHERE id = '.$_GET['id'];
$sth = $conn->prepare($query);
$sth->execute();
$subscriber = $sth->fetch(PDO::FETCH_ASSOC);
//print_r($subscriber);
?>

<?php
ob_start();
?>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Subscriber</h1>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    <a href="add.php" style="color: black">Add New</a>
                </button>

            </div>

            <section class="ftco-section bg-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                            <div class="subscriber">


                                <a href="#" class="img-prod">
                                    <?php echo $subscriber['email'];?>
                                </a>

                                <div class="d-flex">
                                    <div class="link">
                                        <h3><a href="#"><?php echo $subscriber['email'];?></a></h3>
                                        <p><?php echo $subscriber['reason'];?></p>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>
