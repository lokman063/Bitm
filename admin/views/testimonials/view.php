<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");


//selection query
$query = 'SELECT * FROM testimonials WHERE id = '.$_GET['id'];
$sth = $conn->prepare($query);
$sth->execute();

$testimonial = $sth->fetch(PDO::FETCH_ASSOC);

?>

<?php
ob_start();
?>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >testimonial</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="index.php" style="color: black">Go to List</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <section >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm col-md-6 col-lg-3 ">
                                    <div class="testimonial">
                                        <a href="#" class="img-prod"><img class="img-fluid" src="<?php echo $testimonial['picture']?>" alt="Colorlib Template">
                                        </a>
                                        <div class="text ">
                                            <h3><a href="#"><?php echo $testimonial['name']?></a></h3>
                                            <div class="d-flex">
                                                <div class="body">
                                                    <p class="body"><?php echo $testimonial['body']?></p>
                                                </div>


                                            </div>

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
