<?php

include($_SERVER['DOCUMENT_ROOT'] . "/mvc/models/mangas.php");

$model_mangas = new ModelMangas();
$manga = $model_mangas->getDataManga($_REQUEST['id']);

?>

<div class="text-center" style="float: right;">
    <a href="/mangás.php">&larr; Voltar</a>
</div>
<h1><?= $manga['nome'] ?></h1>
<div class="row">
    <div class="col-sm-3 animes_card" style="padding-right: 30px">
        <div class="card">
            <img class="card-img-top img_animes_card" src="<?= $manga['img'] ?>">
            <div class="card-body">
                <p><strong><?= $manga['sinopse'] ?></strong></p>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div row">
            <center>
                <h3><strong><?= count($manga['volumes_comprados']) ?> / <?= $manga['volumes_total'] ?></strong></h3>
            </center>
        </div>
        <div class="row">
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card" src="/images/mangas/beastars_volumes/beastars_1.jpg">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card" src="/images/mangas/beastars_volumes/beastars_2.jpg">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card"
                     src="/images/mangas/beastars_volumes/beastars_3.jpg">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card nao_tenho"
                     src="/images/mangas/beastars_volumes/beastars_4.jpg">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card nao_tenho"
                     src="/images/mangas/beastars_volumes/beastars_5.jpg">
            </div>
        </div>
    </div>
</div>