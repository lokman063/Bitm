<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;
use Bitm\Admin\Admin;

$admin = new Admin();
$admins = $admin->show($_GET['id']);
?>
<?php
ob_start();
?>






<div class="container">
  <div class="row float-left">
  <div class="mr-3 pt-3 rounded mx-auto  d-block">
      <img src="<?=UPLOADS;?><?php echo $admins['picture']?>"  width="300px" height="450px" alt="" class="rounded-circle border-right-0">
    </div>
 
    &nbsp;
   
  </div>
</div>
<div class="container-fluid  mr-3 pt-3">
<div class="row p-3  ">
<div class="col-lg-11">

<table class="table  ">
  <thead>
    <tr >
      <td scope="col "><h4>Name</h4></td>
      <td scope="col "><h4><?php  echo $admins['first_name']." ".$admins['last_name'] ;?> </h4></td>
   

    </tr>
  </thead>
  <tbody>
    

  
 
    <tr>
    <td scope="col"><h4>Father Name</h4></td>
    <td scope="col"><h4><?php  echo $admins['father_name'] ?></h4></td>
   
 
    </tr>

    <tr>
    <td scope="col"><h4>Mother Name</h4></td>
    <td scope="col"><h4><?php  echo $admins['mother_name'] ?></h4></td>
  

    </tr>
    <tr>
    <td scope="col"><h4>NID</h4></td>
    <td scope="col"><h4><?php  echo $admins['nid_birth'] ?></h4></td>
  
  
    </tr>

    <tr>
    <td scope="col"><h4>Phone No</h4></td>
    <td scope="col"><h4><?php  echo $admins['phone'] ?></h4></td>
    

    </tr>
    <tr>
    
    <td scope="col"><h4>Email Id</h4></td>
    <td scope="col"><h4><?php  echo $admins['email'] ?></h4></td>
    </tr>

  </tbody>
</table>
</div>

</div>

</div>
  

<?php
$pagecontent = ob_get_contents();
ob_end_clean();
echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
?>