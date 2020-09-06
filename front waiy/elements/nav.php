<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Utility;
use Bitm\Utility\Message;

//selection query
$query = "SELECT * FROM `catagories` ";
$sth = $conn->prepare($query);
$sth->execute();
$catagories= $sth->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
// echo "<li>".$product['title']."</li>";
?>

<ul class="navbar-nav mr-auto">
   <?php
   foreach($catagories as $category):
   ?>
    <li class="nav-item">
        <a class="nav-link" href="#"><?=$category['name']?></a>
    </li>
    <?php
    endforeach;
    ?>
</ul>