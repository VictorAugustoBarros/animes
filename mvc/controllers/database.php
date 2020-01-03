<?php

class Database
{
    public $mongo;
    public $db;
    public $col;
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'victor', 'apaik7dw', 'mangas', 3306);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function __destruct()
    {
        $this->con = 0;
    }

    public function execute_query($sql)
    {
        return mysqli_query($this->con, $sql);
    }

    asdkasçdlas

    public function last_id()
    {
        return mysqli_insert_id();
    }
}