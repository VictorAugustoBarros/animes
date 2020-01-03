<?php

include($_SERVER['DOCUMENT_ROOT'] . "/mvc/controllers/database.php");

class ModelMangas
{
    var $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($prop, $valor)
    {
        return $this->$prop = $valor;
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

    public function insertNew()
    {
        $sql = "INSERT INTO mangas (nome, sinopse, total_volumes) VALUES ('$this->nome', '$this->sinopse', $this->totalVolumes)";
        $this->db->execute_query($sql);
        $this->__set("id_manga", $this->db->last_id());
        return true;
    }

    public function insertVolumes()
    {
        $volumesArr = split(",", $this->volumes);
        foreach ($volumesArr as $value) {
            $img_path = $this->nome."_".trim($value);
            $sql = "INSERT INTO volumes(id_manga, num_volume, img_path) VALUES (this->id_manga, $value, '$img_path')";
            var_dump($sql);
//            $this->db->execute_query($sql);
        }

        return true;
    }

}