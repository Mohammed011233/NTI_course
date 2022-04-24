<?php

class DB
{
    private $host = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $DBName = 'oop';
    private $connect;

    function __construct()
    {
        $this->connect = mysqli_connect($this->host, $this->username, $this->pass, $this->DBName);

        if (!$this->connect) {
            die("feild to connect Database <br>");
        }
    }

    function doQuery($query)
    {
        return mysqli_query($this->connect, $query);
    }
}
