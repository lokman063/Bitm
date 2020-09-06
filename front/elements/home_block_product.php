<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//selection query
$query = "SELECT * FROM products ORDER BY id DESC";
$sth = $conn->prepare($query);
$sth->execute();
$newproducts = $sth->fetchAll(PDO::FETCH_ASSOC);
?>



<?php
foreach($newproducts as $newproduct):
?>
    <form action="<?=FRONT?>/addtocart.php" method="post">
        <div>
            <input type="hidden" name="id" value="<?php echo $newproduct['id'];?>">
            <input type="hidden" name="title" value="<?php echo $newproduct['title'];?>">
            <input type="hidden" name="mrp" value="<?php echo $newproduct['mrp'];?>">
        </div>
<div class="col-lg-4">






        <div class="card" style="width: 18rem;">
            <img src="<?=UPLOADS?><?=$newproduct['picture'];?>" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title"><?=$newproduct['title'];?></h5>
                <p class="card-text"><?=$newproduct['short_description'];?></p>
                <p class="card-text"><?=$newproduct['mrp'];?></p>


        <button class="btn btn-danger" type="submit")">add to cart</button>
            </div>

        </td>
                </div>

</div>

    </div>
    </form></td>
<?php
endforeach;
?>