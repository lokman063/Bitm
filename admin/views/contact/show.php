<?php
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >contact</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>contact/index.php" style="color: black">Go to list</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <section >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm  ">
                                    <div >

                                        <div >
                       &nbsp;
                                            <div>Name:</div>
                                            <h3 class="col-lg-4"><a href="#"> <?php echo $contacts['name']?></a></h3><br>

                                                <div>Email:</div>
                                                    <p class="col-lg-4"><?php echo $contacts['email']?>&nbsp;
                                                        </p><br>

                                                                                                   &nbsp;
<div>Comment:</div>
<?php
if (!empty($contacts['comment'])){
    ?>

                                            <div class="col-lg-6">
                                                <?php echo $contacts['comment'];?>
                                            </div>

 <?php
}else{
?>
<div>No comment</div>

<?php
}
?>


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