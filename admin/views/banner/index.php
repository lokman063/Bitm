<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Banner\Banner;
 if (isset($_POST['search'])) {
    $banner = new Banner();
    $banners = $banner->search($_POST['search']);
 if(empty( $banners)){

    $searching = "The Banner not found. Please Try again";


 }
 }else {
    $banner = new Banner();
    $banners = $banner->all();
 }



//dd($banners);


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
                    <h1 >BANNERS</h1>
<div>

<form class="" method="post" action="">
  <input class=" btn btn-outline-dark" type="text" placeholder="Search.." name="search">
  <button class=" btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
</form>

</div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button"  class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>banner/create.php" style="color: black">Add a new Banner</a>
                        |
                        <a href="<?=VIEW;?>banner/inactive.php" style="color: black">Inactive Banner</a>
                        |
                        <a href="<?=VIEW;?>banner/active.php" style="color: black">Active Bannner</a>

                        <a href="<?=VIEW;?>banner/trash.php" style="color: black">Trash</a>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">

                                <th><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"><h5>all</h5></th>
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?php         if(!empty($searching)){ ?>
<tr>
<td class="banner-name">
                                    
 <?php  echo $searching;?></h3>
</tr>


   
     <?php
}
?>

<?php 

                            if($banners){
                            
                                foreach($banners as $banner){
                                    ?>
                                   
                                    <tr class="text-center">

<td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                        <td class="image-prod"><div class="img"><img src="<?=UPLOADS?><?php echo $banner['picture']?>" width="140px" height="120px"></div></td>

                                        <td class="banner-name">
                                            <h3><a href="show.php?id=<?php echo $banner['id'] ?>">
                                                    <?php echo $banner['title'];?></a></h3>
                                            <h4 class="col-8">
                                                <?php echo $banner['html_banner'];?>
                                                   </h4>
                                        </td>
                                        <td><a href="<?php echo $banner['link'];?>">
                                                <?php echo $banner['link'];?></a></td>
                                      
                                      
                                        <td><p> <?php if ($banner['is_active']==1) {
                                           echo "Active";
                                        }else {
                                            echo "Deactive";
                                        } ?></p>
                                               </td>
                                      
                                      
                                      
                                      
                                      
                                        <td > <a type="button" class="btn btn-primary btn-sm" href="<?=VIEW?>banner/edit.php?id=<?php echo $banner['id']?>">Edit</a>
                                             <p> </p>
                                             <p> </p>
                                            <form action="<?=VIEW?>banner/softdelete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $banner['id'];?>">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                       
                                        </form></td>
                                    </tr>
                                <?php }
                            }else{
                                if (empty($searching)) {
                                  
                               
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no banner available. <a href="create.php">Click Here</a> to add a banner.
                                    </td>
                                </tr>
                                <?php
                            } }
                            
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


