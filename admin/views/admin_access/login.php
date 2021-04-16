<?php


?>
<!doctype html>
<html lang="en">

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/phpcrud/admin/views/elements/head.php');?>
<body>
<?php //include_once($_SERVER['DOCUMENT_ROOT'].'/phpcrud/admin/views/elements/header.php'); ?>
<main role="main">
<div class="container marketing">
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->

    <form method="post" action="index.php" role="form">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <button type="submit"> Login</button>
      </form>
 

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
    </div>

</main>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/phpcrud/admin/views/elements/scripts.php'); ?>
</body>
</html>