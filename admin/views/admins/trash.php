<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Admin\Admin;
global $get_page;

//connect to database
$admin = new Admin();
$admins = $admin->trash();

//limit
// if (isset($_GET['limit'])) {
//     $limit = ($_GET['limit']);
 
// }else {
//     $limit = 5;
// }


// if (isset($_GET['page'])) {
// $get_page = $_GET['page'];
   
 

// $next = $get_page + 1;
// $previous =$get_page - 1 ;

// }

// if ($get_page == "" || $get_page=="1") {
//     $targetPage = "0";
   

// }
// else {
//     $targetPage = ($get_page*5)-5;
// }

// //selection query 
// $query = "SELECT * FROM `admins` WHERE is_deleted = 1 ORDER BY id DESC limit $targetPage, 5  ";
// $sth = $conn->prepare($query);
// $sth->execute();
// $admins = $sth->fetchAll(PDO::FETCH_ASSOC);

// //for pagination 
// $query2 = "SELECT * FROM `admins`  WHERE is_deleted = 1 ";
// $sth = $conn->prepare($query2);
// $sth->execute();
// $admin_list = $sth->fetchAll(PDO::FETCH_ASSOC);
//     $count = count($admin_list);

//     $count = $count/3;
//     $pages = ceil($count);
 






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
                    <h1 >Admin</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        <a href="<?=VIEW;?>admins/create.php" style="color: black">Add new Admin</a>||
                        <a href="<?=VIEW;?>admins/active.php" style="color: black">Active Admin</a>||
                        <a href="<?=VIEW;?>admins/inactive.php" style="color: black">Inactive Admin</a>||
                        <a href="<?=VIEW;?>admins/trash.php" style="color: black">Trash</a>
                    </button>

                    </div>
   
            
       
        </div>


<!-- 

        <form  id="product-entry-form" method="get" action="" role="form">
  
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
     <select class="form-control" id="limit" name="limit">
                <?php foreach ($limits= ['2','4','5','10'] as $limit) {
                ?>

                <option value="<?= $limit;?>"><?=$limit?></option>
           
                <?php } ?>
                </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 -->





            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>

                                <th>photo</th>
                                <th>Name</th>
                   
                                <th>Email</th>
                                <th>Phone</th>
                                <th>NID</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($admins){
                                foreach($admins as $admin){
                                    ?>
                                    <tr class="text-center table-size">
                                        <td class="admin-sl"> <td class="image-prod"><div class="img"><img src="<?=UPLOADS?><?php echo $admin['photo']?>" width="50px" height="40px"></div></td></td>
                                        <td class="admin-name">
                                            <h5><a href="view.php?id=<?php echo $admin['id'] ?>">
                                            <?php echo $admin['first_name']." ".$admin['last_name'];?> </a></h5>
                                        </td>
                                        <td class="email-admin">
                                            <p><?php echo $admin['email']?></p>
                                        </td>

                                        <td class="admin-phone">
                                            <p><?php echo $admin['phone'];?></p>
                                        </td>
                                        <td class="admin-phone">
                                            <p><?php echo $admin['nid_birth'];?></p>
                                        </td>

                                        <td> <a href="edit.php?id=<?php echo $admin['id']?>"><i class="fas fa-edit"></i></a>
                                            | <a href="delete.php?id=<?php echo $admin['id']?>"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php }}else{
                                ?>
                                <tr class="text-center">
                                    <td colspan="5">
                                        There is no product available. <a href="create.php">Click Here</a> to add a product.
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>


  
   <div>


<!--pagination
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">


    
    <li class="page-item <?php if ( $get_page <2) {
        echo 'disabled';
    }?>">
 
      <a class="page-link" href="index.php?page=<?= $previous;?>">Previous</a>
    </li>

    <?php


    for ($page=1; $page < $pages ; $page++) { 
   
    ?>
 
    <li class="page-item  <?php if ($page == $get_page) {
       echo 'active';  } ?>"><a class="page-link" href="index.php?page=<?php echo $page; ?>"><?php echo $page;?></a></li>
   
    <?php 
    }
    ?>

    <li class="page-item  <?php if (($get_page >= $pages-2)) {
       echo 'disabled';  } ?> ">
    

      <a class="page-link" href="index.php?page=<?= $next?>">Next</a>
    </li>

  </ul>
</nav> 


 -->


  


   </div>
                    </div>
                </div>
            </div>



        </main>

<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>

