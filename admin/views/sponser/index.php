<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;

//selection query
$query = "SELECT * FROM sponsers";
$sth = $conn->prepare($query);
$sth->execute();
$sponsers = $sth->fetchAll(PDO::FETCH_ASSOC);
//foreach($sponsers as $row){
//echo "<pre>";
//print_r($row['mrp']);
//echo "</pre>";
//
//}
//die();
   // echo "<li>".$sponser['title']."</li>";
?>
<?php
ob_start();
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >Sponser</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="add.php" style="color: black">Add New</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>picture</th>
                                <th>title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($sponsers){
                            foreach($sponsers as $sponser){
                            ?>
                            <tr class="text-center">
                                <td class="sponser-sl">&nbsp;</td>
                                <td class="image-prod"><div class="img"><img src="<?php echo $sponser['picture']?>" width="140px" height="120px"></div></td>

                                <td class="sponser-name">
                                    <h3><a href="view.php?id=<?php echo $sponser['id'] ?>"><?php echo $sponser['title'];?></a></h3>
                                    <p><?php echo $sponser['title'];?></p>
                                </td>

                                <td> <a href="edit.php?id=<?php echo $sponser['id']?>">Edit</a>
                                    | <a href="delete.php?id=<?php echo $sponser['id']?>">Delete</a></td>
                            </tr>
                            <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no sponser available. <a href="add.php">Click Here</a> to add a sponser.
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </main>
<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>


