<?php

use Bitm\Utility\Message;

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
//collect the data
$name = $_POST['name'];


//prepare the insert query
//selection query
$query = "INSERT INTO `catagories` (`id`, 
`name`,
 `link`,
  `soft_delete`, 
  `is_draft`,
   `created_at`,
    `modified_at`)
     VALUES (NULL,
      :name,
       NULL,
        NULL,
         NULL,
          NULL,
           NULL);";

$sth = $conn->prepare($query);
$sth->bindParam(':name',$name);
$result = $sth->execute();


//redirect to index page
header("location:index.php");
