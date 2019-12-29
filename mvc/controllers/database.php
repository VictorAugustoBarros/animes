<?php

class Database
{
    public $mongo;
    public $db;
    public $col;
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect('10.151.27.147', 'victor.barros', 'Vic@0809.PG', 'esms', 3306);
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