<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Category\Category;


$category = new Category(); 
$categories= $category->all();
//print_r($result);
// echo "<li>".$product['title']."</li>";

?>

<?php
ob_start();
?>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 >Categories</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="create.php" style="color: black">Add New</a>
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
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($categories){
                                foreach($categories as $category){
                                    ?>
                                    <tr class="text-center">
                                        <td class="category-sl"><a href="#"><span class="ion-ios-close"></span></a></td>

                                        <td class="category-name">
                                            <h3><a href="show.php?id=<?php echo $category['id'] ?>"><?php echo $category['category_title'];?></a></h3>

                                        </td>

                                        <td>   <td > <a type="button" class="btn btn-primary btn-sm" href="<?=VIEW?>categories/edit.php?id=<?php echo $category['id']?>">Edit</a>
                                             <p> </p>
                                             <p> </p>
                                            <form action="<?=VIEW?>categories/delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $category['id'];?>">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                      
                                        </form></td>
                                    </tr>
                                <?php } }else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no category available. <a href="create.php">Click Here</a> to add a brand.
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
