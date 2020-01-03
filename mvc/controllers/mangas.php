<?php

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
        $response = array();
        try{
            $model_mangas = new ModelMangas();
            $model_mangas->__set("nome", $params['nome']);
            $model_mangas->__set("sinopse", $params['sinopse']);
            $model_mangas->__set("totalVolumes", $params['totalVolumes']);
            $model_mangas->__set("volumes", $params['volumes']);

            $model_mangas->insertNew();
//            $model_mangas->insertVolumes();

            $response['msg'] = "Registro inserido com sucesso!";

        }catch (Exception $e){
            $response['msg'] = "Falha ao inserir registro! -> $e->getMessage()";
        }

        return $response;
    }
}