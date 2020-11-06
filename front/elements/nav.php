<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Utility;
use Bitm\Utility\Message;
use Bitm\Category\Category;

//selection query
$category = new Category(); 
$categories= $category->all();
//print_r($result);
// echo "<li>".$product['title']."</li>";
?>

<ul class="navbar-nav mr-auto">
   <?php
   foreach($categories as $category):
   ?>
    <li class="nav-item">
        <a class="nav-link" href="#"><?=$category['category_title']?></a>
    </li>
    <?php
    endforeach;
    ?>
</ul>