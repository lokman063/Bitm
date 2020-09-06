<?php


use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data

//for image
//dd($_FILES);
/**
$target_file =  $_FILES['picture']['tmp_name'];
$filename = time()."_".$_FILES['picture']['name'];
$dest_file =  $_SERVER['DOCUMENT_ROOT'].'/phpcrud/uploads/'.$filename;
   // echo $_FILES['picture']['tmp_name'];
//echo $_FILES['picture']['size'];
$is_uploaded = move_uploaded_file($target_file,$dest_file);

if ($is_uploaded){
    $dest_filename = $filename;
}
else{
    $dest_filename = "";
}
//die($uploaded);
 * */
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$comment = $_POST['comment'];



//$title = $_POST['promotional_message'];
//$title = $_POST['html_banner'];


//prepare the insert query
//selection query



$query = "INSERT INTO `contacts` (`id`,
 `name`, 
 `email`, 
 `subject`, 
 `comment`, 
 `status`, 
 `soft_delete`,
  `date`) 
VALUES (NULL,
 :name, 
 :email,
  :subject,
   :comment,
    NULL,
     NULL
     , :date);";


$sth = $conn->prepare($query);
$sth->bindParam(':name',$name);
$sth->bindParam(':email',$email);
$sth->bindParam(':subject',$subject);
$sth->bindParam(':comment',$comment);
$sth->bindParam(':date',date('Y-m-d h:i:s'));

//$sth->bindParam(':promotional_message',$promotional_message);
//$sth->bindParam(':html_banner',$html_banner);
$result = $sth->execute();

//print_r($result);
//redirect to index page
if($result){
    Message::set('Coantact has been added successfully.');
    header("location:index.php");
}else{
    Message::set('Sorry.. There is a problem. Please try again later');
    //log
    header("location:create.php");
}
