<?php

class Database
{
    private $server = "localhost";
    private $user = "";
    private $password = "";
    private $dbName = "";
    private $db;

    public function dbConnection()
    {
        $this->db = mysqli_connect($this->server, $this->user, $this->password, $this->dbName);
        if (!$this->db) {
            echo "DataBase Connection failed";
        }
        return $this->db;
    }
}


?>
