<?php

class Database
{
    public $db;
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect('10.151.27.147', 'victor.barros', 'Vic@0809.PG', 'esms', 3306);
    }

    public function __destruct()
    {
        mysqli_close($this->con);
        $this->con = 0;
    }

    public function execute_query($sql)
    {
        return mysqli_query($this->con, $sql);
    }
}