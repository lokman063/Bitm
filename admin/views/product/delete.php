<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

if (uss) {
    # code...
}
$id = $_GET['id'];




if(isset($_GET['delete_id']) && $_GET['delete_id'] != ''){
    $id = $_GET['delete_id'];
    
    
    $get_data = "SELECT * FROM product WHERE id='$id'";
    $data = mysqli_query($conn,$get_data);
    $row = mysqli_fetch_array($data);
    $old_image = 'upload/'.$row['image'];//file with folder path

    $query = 'DELETE FROM product WHERE id="'.$id.'"';
    $result = mysqli_query($conn,$query);

    if($result){
        unlink($old_image);// remove file from destination folder
        echo "<script>alert('Data has been deleted successfully!')</script>";
        echo "<script>window.open('product.php','_self')</script>";
    }
}





$query = "DELETE FROM `products` WHERE `products`.`id` = :id;";

$sth = $conn->prepare($query);
$sth->bindParam(':id',$id);
$result = $sth->execute();

//redirect to index page
header("location:index.php");
