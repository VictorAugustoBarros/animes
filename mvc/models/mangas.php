<?php

//include($_SERVER['DOCUMENT_ROOT'] . "/mvc/controllers/database.php");

class ModelMangas
{
    var $db;

    public function __construct()
    {
//        $this->db = new Database();
    }

    public function getCards()
    {
        $data = array('Gintama', '/images/animes/gintama.jpg');
        return $data;
    }

    public function getDataManga($id)
    {
        $manga = array(
            'id' => 0,
            'nome' => 'Beastars',
            'img' => "/images/mangas/beastars.jpg",
            'sinopse' => "Beastars se passa em um mundo onde animais antropomórficos, herbívoros e carnívoros convivem uns com os outros. O protagonista da história é Legosi, um lobo que faz parte do clube de drama do colégio Cherryton.",
            'volumes_total' => 5,
            'volumes_comprados' => array(1, 2, 3)
        );
        return $manga;
    }

    public function insertNew($_params)
    {
        $this->db->insertNew($_params);
        return true;
    }

}