<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Brand\Brand;

$brand = new Brand();
$brands = $brand->all();

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
        <h1 >Brand</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
                <span data-feather="calendar"></span>
                <a href="<?=VIEW;?>brand/active.php" style="color: black">Active </a>
                | <a href="<?=VIEW;?>brand/inactive.php" style="color: black">Inactive </a>
                | <a href="<?=VIEW;?>brand/create.php" style="color: black">Add New</a>
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
                        <th>brand_picture</th>
                        <th>brand_title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($brands){
                        foreach($brands as $brand){
                            ?>
                            <tr class="text-center">
                                <td class="brand-sl">&nbsp;</td>

                                <td class="image-prod"><div class="img">
                                        <img src="<?=UPLOADS?><?php echo $brand['brand_picture']?>"
                                             width="140px" height="120px">
                                    </div></td>

                                <td class="brand-name">
                                    <h3><a href="show.php?id=<?php echo $brand['id'] ?>"><?php echo $brand['brand_title'];?></a></h3>

                                </td>

                                <td > <a type="button" class="btn btn-primary btn-sm" href="<?=VIEW?>brand/edit.php?id=<?php echo $brand['id']?>">Edit</a>
                                             <p> </p>
                                             <p> </p>
                                            <form action="<?=VIEW?>brand/delete.php" method="post">
                                                <input type="hidden" name="brand_picture" value="<?php echo $brand['brand_picture'];?>">
                                                <input type="hidden" name="id" value="<?php echo $brand['id'];?>">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                      
                                        </form></td>
                            </tr>
                        <?php }}else{
                        ?>
                        <tr class="text-center">
                            <td colspan="5">
                                There is no brand available. <a href="create.php">Click Here</a> to add a brand.
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

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


