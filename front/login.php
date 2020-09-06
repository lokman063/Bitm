<!doctype html>
<html lang="en">
<?php //include_once('elements/head.php'); ?>
<body>
<?php //include_once('elements/header.php'); ?>
<main role="main">

     <div class="container marketing">
         <form action="login_process.php" method="post">
             <div class="form-group">
                 <label for="exampleInputEmail1">Email address</label>
                 <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="adf@sdf.sd" >
                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                 <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>
             
             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
    </div>
    <?php include_once('elements/footer.php'); ?>
</main>
<?php include_once('elements/scripts.php'); ?>
</body>
</html>