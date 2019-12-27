<?php

include($_SERVER['DOCUMENT_ROOT'] . "/mvc/models/mangas.php");

$model_mangas = new ModelMangas();
$manga = $model_mangas->getDataManga($_REQUEST['id']);

?>

<div class="row">
    <div class="col-sm-6 animes_card">
        <h1><?= $manga['nome'] ?></h1>
    </div>
    <div class="col-sm-6 animes_card">
        <div class="text-center" style="float: right;">
            <a href="/mangas.php">&larr; Voltar</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 animes_card">
        <div style="text-align: center">
            <h3><strong><?= count($manga['volumes_comprados']) ?> / <?= $manga['volumes_total'] ?></strong></h3>
        </div>
        <div class="row">
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card" src="/images/mangas/beastars_volumes/beastars_1.jpg" alt="">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card" src="/images/mangas/beastars_volumes/beastars_2.jpg" alt="">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card"
                     src="/images/mangas/beastars_volumes/beastars_3.jpg" alt="">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card nao_tenho"
                     src="/images/mangas/beastars_volumes/beastars_4.jpg" alt="">
            </div>
            <div class="col-sm-3 mangas_card">
                <img class="card-img-top img_animes_card nao_tenho"
                     src="/images/mangas/beastars_volumes/beastars_5.jpg" alt="">
            </div>
        </div>
    </div>
</div>