<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/phpcrud/bootstrap.php");
use Bitm\Utility\Message;
use Bitm\Utility\Utility;


//selection query
$query = "SELECT * FROM banners WHERE soft_delete = 0 ORDER BY id DESC ";
$sth = $conn->prepare($query);
$sth->execute();
$banners = $sth->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <?php
        $activeClass = 'active';
        foreach($banners as $banner):
        ?>
            <div class="carousel-item <?=$activeClass;?>">
                <img src="<?=UPLOADS?><?=$banner['picture'];?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?=$banner['title'];?></h5>
                    <p><?=$banner['promotional_message'];?></p>
                </div>
            </div>
            <?php
            $activeClass = '';
            endforeach;
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>