
<?php
//print_r($_REQUEST); die();
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");

//collect the data
$title = $_POST['title'];
//$picture = $_POST['picture'];

//$picture = $_POST['picture'];
//$picture = $_POST['picture'];


//prepare the insert query
//selection query
$query = "INSERT INTO `sponsers` (`id`, `title`, `picture`, `link`, `promotional_message`, `html_banner`, `is_active`, `is_draft`, `soft_delete`, `created_at`, `modified_at`) VALUES (NULL, :title, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";




$sth = $conn->prepare($query);
$sth->bindParam(':title',$title);
//$sth->bindParam(':picture',$picture);
//$sth->bindParam(':picture',$picture);
$result = $sth->execute();

//print_r($result); die();
//redirect to index page
header("location:index.php");
