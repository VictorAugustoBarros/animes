<?php

class Database
{
    public $mongo;
    public $db;
    public $col;
    public $con;

    public function __construct()
    {
//        $this->con = mysqli_connect('10.151.27.147', 'victor.barros', 'Vic@0809.PG', 'esms', 3306);
//        try {
//            $con = new MongoClient("mongodb://localhost:27017/Testes");
//            $db = $con->selectDB('Testes');
//
//            $col = $db->selectCollection('mangas');
//            $col->find();
//
//            var_dump($col);
//
//            $con->close();
//        } catch (Exception $e) {
////            var_dump($e);
//        }

    }

    public function __destruct()
    {
        $this->con = 0;
    }

    public function selectAll()
    {
        $rows = $this->db->mangas->find();
        return $rows;
    }

    public function insertNew($data)
    {
        $this->db->mangas->insert($data);
        return true;
    }

    public function execute_query($sql)
    {
        return mysqli_query($this->con, $sql);
    }
}