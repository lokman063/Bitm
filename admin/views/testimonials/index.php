<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$query = "SELECT * FROM `testimonials`";
$sth = $conn->prepare($query);
$sth->execute();
$testimonials = $sth->fetchAll(PDO::FETCH_ASSOC);
//foreach($products as $row){
//echo "<pre>";
//print_r($row['mrp']);
//echo "</pre>";
//
//}
//die();
// echo "<li>".$product['title']."</li>";

?>
<?php
ob_start();
?>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >Testimonial</h1>
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
                                <th>Picture</th>
                                <th>Body</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($testimonials){
                                foreach($testimonials as $testimonial){
                                    ?>
                                    <tr class="text-center">
                                        <td class="testimonial-sl"> </td>

                                        <td class="image-prod"><div class="img"><img src="<?php echo $testimonial['picture']?>" width="140px" height="120px"></div></td>
                                        <td class="testimonial-body">
                                            <h3><?php echo $testimonial['body'];?></h3>
                                        </td>

                                        <td class="testimonial-name">
                                            <h3><a href="view.php?id=<?php echo $testimonial['id'] ?>"><?php echo $testimonial['name'];?></a></h3>
                                           
                                        </td>

                                        <td> <a href="edit.php?id=<?php echo $testimonial['id']?>">Edit</a>
                                            | <a href="delete.php?id=<?php echo $testimonial['id']?>">Delete</a></td>
                                    </tr>
                                <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no testimonial available. <a href="add.php">Click Here</a> to add a testimonial.
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
