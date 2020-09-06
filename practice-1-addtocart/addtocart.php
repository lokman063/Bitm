<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;


//selection query
$query = "SELECT * FROM products  WHERE id = :id";
$sth = $conn->prepare($query);
$sth->execute();
$product = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>
  <body>
  <form id="product-entry-form" enctype="multipart/form-data" method="post" action="restore.php" role="form">
      <div class="messages"></div>
      <h1>Edit Product</h1>
      <div class="controls">


<!--          <div class="row">-->
              <input  value="<?php echo $product['id']?>" type="text" value="<?php echo $product['id']?>" name="id" class="form-control">
<!--              <input id="id"  value="--><?php //echo $banners['picture']?><!--" type="hidden" name="pre_picture" class="form-control">-->
<!---->

<!--          </div>-->

<!--          <div class="col-lg-8">-->
<!--              <div class="form-group">-->
<!--                  <label for="title">Enter Product Title</label>-->
<!--                  <input id="title"-->
<!--                         value=""-->
<!--                         type="text"-->
<!--                         name="title"-->
<!--                         placeholder="e.g. Bashundhara Tissue"-->
<!--                         autofocus="autofocus"-->
<!--                         class="form-control">-->
<!--                  <div class="help-block text-muted">Enter Product Title</div>-->
<!--                  <div class="help-block with-errors"></div>-->
<!--              </div>-->
<!--          </div>-->



          <button type="submit" class="btn btn-success">
              Send & Save Product
          </button>

      </div>

  </form>

  <form action="<?=WEBROOT?>practice-1-addtocart/restore.php" method="post">
      <input type="text" name="id" value="<?php echo $product['id'];?>">
      <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
      </td>
  </form></td>
     Optional JavaScript
     jQuery first, then Popper.js, then Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>