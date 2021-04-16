<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Admin\Admin;

//selection query

$admins = new Admin();

$admin = $admins->show( $_GET['id']);

?>

<?php
ob_start();
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



<form id="product-entry-form" enctype="multipart/form-data" method="post" action="update.php" role="form">

    <div class="messages"></div>
    <h1>Update Details</h1>
    <div class="controls">
    <div class="row">
    <input id="id"  value="<?php echo $admin['id']?>" type="hidden" name="id" class="form-control">
    </div>

<hr>

           <hr>
           </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="first_name"><h4>First Name </h4></label>
                    <input id="first_name"
                           value="<?php echo $admin['first_name']?>"
                           type="text"
                           name="first_name"
                           placeholder="Enter The First Name"
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter The First Name</div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="last_name"><h4>Last Name </h4></label>
                    <input id="last_name"
                           value="<?php echo $admin['last_name']?>"
                           type="text"
                           name="last_name"
                           placeholder="Enter The Last Name"
                           autofocus="autofocus"
                           class="form-control">
                    <div class="help-block text-muted">Enter The Last Name</div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
                                
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="father_name"><h4>Father Name</h4></label>
                                            <input id="father_name" placeholder="Enter The Father Name" value="<?php echo $admin['father_name']?>" type="text" name="father_name" class="form-control">
                                            <div class="help-block text-muted">Enter Your Father Name</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mother_name"><h4>Mother Name</h4></label>
                                            <input id="mother_name" placeholder="Enter The Mother Name" value="<?php echo $admin['mother_name']?>" type="text" name="mother_name" class="form-control">
                                            <div class="help-block text-muted">Enter Your Mother Name</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone"><h4>Mobile No</h4></label>
                                            <input id="phone" placeholder="Enter the Phone No" value="<?php echo $admin['phone']?>" type="text" name="phone" class="form-control">
                                            <div class="help-block text-muted">Enter Your Phone No</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nid_birth"><h4>National ID/ Birth Certificate<p>(Optional)</p></h4></label>
                                            <input id="nid_birth" placeholder="Enter The NID (If you have)" value="<?php echo $admin['nid_birth']?>" type="text" name="nid_birth" class="form-control">
                                            <div class="help-block text-muted">Enter Your NID (If you have)</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email"><h4>Email</p></h4></label>
                                            <input id="email" placeholder="Enter Your Email" value="<?php echo $admin['email']?>" type="text" name="email" class="form-control">
                                            <div class="help-block text-muted">Enter Your Email</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password"><h4>Password</h4></label>
                                            <input id="password" placeholder="Enter Your Password" value="" type="password" name="password" class="form-control">
                                            <div class="help-block text-muted">Enter Your Password</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="photo"><h4>Profile Photo</h4></label>
                                            <input id="photo"  value="" type="file" name="photo" class="form-control">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <?php 


//for showing picture or no showing
if(!empty($admin['photo'])){
    ?>
    <div><img class="col-3" src="<?=UPLOADS;?><?php echo $admin['photo']?>"  alt="<?php echo $admin['first_name'].$admin['last_name']?>"></div>
 <?php
} else{
    ?>
    <div>No photo avialabe</div>
    <?php
}
?>
 &nbsp;
                                    <!-- <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="is_active">Active</label>
                                            <input id="is_active"  value="1" checked="checked"  type="checkbox" name="is_active" class="form-control">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> -->



<div class="col-lg-6">
            <button type="submit" class="btn btn-success">
             Update
            </button>


        </div>

</form>
</main>
                            <?php
                            $pagecontent = ob_get_contents();
                            ob_end_clean();
                            echo str_replace("##MAIN_CONTENT##",$pagecontent,$layout);
                            ?>
