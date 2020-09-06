<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$query = "SELECT * FROM brands WHERE is_active = 1 ORDER BY id ASC";
$sth = $conn->prepare($query);
$sth->execute();
$brands = $sth->fetchAll(PDO::FETCH_ASSOC);

use Bitm\Utility\Message; ?>

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
                <a href="<?=VIEW;?>brand/active.php" style="color: black">Active Brands</a>
                | <a href="<?=VIEW;?>brand/inactive.php" style="color: black">In active Brands</a>
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
                        <th>Picture</th>
                        <th>Title</th>
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
                                        <img src="<?=UPLOADS?><?php echo $brand['picture']?>"
                                             width="140px" height="120px">
                                    </div></td>

                                <td class="brand-name">
                                    <h3><a href="show.php?id=<?php echo $brand['id'] ?>"><?php echo $brand['title'];?></a></h3>
                                </td>

                                <td> <a href="<?=VIEW?>brand/edit.php?id=<?php echo $brand['id']?>">Edit</a>
                                    | <a href="<?=VIEW?>brand/delete.php?id=<?php echo $brand['id']?>">Delete</a>
                                    | <a href="<?=VIEW?>brand/deactivate.php?id=<?php echo $brand['id']?>">Deactivate</a>
                                </td>
                            </tr>
                        <?php }}else{
                        ?>
                        <tr class="text-center">
                            <td colspan="5">
                                There is no active brand available. <a href="inactive.php">Click Here</a> to see deactive brand.
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


