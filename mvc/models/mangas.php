<?php

include($_SERVER['DOCUMENT_ROOT'] . "/mvc/controllers/database.php");

class ModelMangas{
    public function __construct()
    {

    }

    public function getCards(){
        $data = array('Gintama', '/images/animes/gintama.jpg');
        return $data;
    }

    public function getDataManga($id){
        $data = array('Gintama', '/images/animes/gintama.jpg');
        return $data;
    }
}