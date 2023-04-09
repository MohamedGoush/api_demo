<?php

class Database
{
    private $server = "localhost";
    private $user = "u384900722_upwork";
    private $password = "Sunwukongjoker7";
    private $dbName = "u384900722_upwork_db";
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