<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\brand\Brand;
//selection query

$brand = new Brand();
$brands = $brand->show($_GET['id']);




if(empty($brands)){
    Message::set(' Banner is not Found');
    header("location:index.php");
    return $brands;
}


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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >banner</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>banner/index.php" style="color: black">Go to list</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <section >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm  ">
                                    <div class="banner">
                                        <a href="#" class="img-prod"><div class="img"><img src="<?=UPLOADS;?><?php echo $brands['picture']?>" width="750px" height="350px"></div>

                                        </a>
                                        <div class="text ">
                       &nbsp;
                                            <h3><a href="#"><?php echo $brands['title']?></a></h3><br>
                                            <div class="d-flex">

                                                    <p class="col-lg-4"><?php echo $brands['link']?>&nbsp;
                                                        </p><br>
                                                    <div class="col-lg-6">
                                                     
                                                        <?php  if($brands['is_active']){
                                                            echo 'the brand is active';
                                                        }else{
                                                            echo 'the brand is not active';
                                                        }
                                                        ?>
                                                    </div>

                                                &nbsp;

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