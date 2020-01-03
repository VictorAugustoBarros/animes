<?php

class Database
{
    public $mongo;
    public $db;
    public $col;
    public $con;

    public function __construct()
    {
        $link = mysql_connect('localhost:/var/run/mysqld/mysqld.sock', 'root', 'apaik7dw');
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db ("mangas");
        echo 'Connected successfully';
    }

    public function __destruct()
    {
        $this->con = 0;
    }

    public function execute_query($sql)
    {
        return mysqli_query($this->con, $sql);
    }

    public function last_id()
    {
        return mysqli_insert_id();
    }
}