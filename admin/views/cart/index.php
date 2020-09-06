<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;


//selection query
$query = "SELECT * FROM carts ORDER BY id DESC ";
$sth = $conn->prepare($query);
$sth->execute();
$carts = $sth->fetchAll(PDO::FETCH_ASSOC);
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
                    <h1 >carts</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>cart/create.php" style="color: black">Add a new cart</a>



                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">

                                <th>Picture</th>
                                <th>Product title</th>
                                <th>Product id</th>

                                <th>qty</th>
                                <th>Unit Price</th>
                                    <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                            if($carts){
                                foreach($carts as $cart){
                                    ?>
                                    <tr class="text-center">


                                        <td class="image-prod"><div class="img"><img src="<?=UPLOADS?><?php echo $cart['picture']?>" width="140px" height="120px"></div></td>


                                        <td><h2>
                                                    <?php echo $cart['product_title'];?></a></h2></td>
                                        <td class="cart-name">
                                            <h5><a href="show.php?id=<?php echo $cart['id'] ?>">
                                                    <?php echo $cart['product_id'];?></a></h5>

                                        </td>
                                        <td><a href="<?php echo $cart['qty'];?>">
                                                <?php echo $cart['qty'];?></a></td>
                                        <td><a href="<?php echo $cart['unite_price'];?>">
                                                <?php echo $cart['unit_price'];?></a></td>
                                        <td > <a type="button" class="btn btn-primary btn-sm" href="<?=VIEW?>cart/edit.php?id=<?php echo $cart['id']?>">Edit</a>
                                            <p> </p>
                                            <p> </p>
                                            <form action="<?=VIEW?>cart/delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $cart['id'];?>">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                        </td>
                                        </form></td>
                                    </tr>
                                <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no cart available. <a href="create.php">Click Here</a> to add a cart.
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


