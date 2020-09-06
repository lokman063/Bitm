<?php
//connect to database
use Bitm\Utility\Message;
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

//selection query
$query = 'SELECT * FROM catagories WHERE id = '.$_GET['id'];
$sth = $conn->prepare($query);
$sth->execute();

$categories = $sth->fetch(PDO::FETCH_ASSOC);

?>
<?php
ob_start();
?>




        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >Brands</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="create.php" style="color: black">Add New</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <section >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm col-md-6 col-lg-3 ">
                                    <div class="brand">
                                       
                                        <div class="text ">
                                            <h3><a href="#"><?php echo $categories['name']?></a></h3>


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
