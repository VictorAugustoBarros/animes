﻿<?php

include($_SERVER['DOCUMENT_ROOT'] . "/mvc/models/mangas.php");

class Mangas
{

    public function listCards()
    {
        $model_mangas = new ModelMangas();
        $dados = $model_mangas->getCards();

        return $dados;
    }

    public function insertNewManga($params)
    {
        var_dump($params);
        exit();
        $model_mangas = new ModelMangas();
        $model_mangas->insertNew($params);
        exit();
    }
}