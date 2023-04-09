<?php

class UserModel
{

    private $db;

    private $tableName = "user";
    private $name;
    private $email;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function fetchAllUser()
    {
        $result = $this->db->query("SELECT * FROM $this->tableName ");

        if (mysqli_num_rows($result) > 0) {
            $list = array();
            while ($row = $result->fetch_assoc()) {
                $list["Result"][] = $row;
            }
            echo json_encode($list);
            exit();
        } else {
            $msg = array("status" => 0, "message" => "No Data Found");
            echo json_encode($msg);
        }
    }
    public function fetchSingleUser($name)
    {
        $result = $this->db->query("SELECT * FROM $this->tableName  WHERE name=$name");

        if (mysqli_num_rows($result) > 0) {
            $list = array();
            while ($row = $result->fetch_assoc()) {
                $list["Result"][] = $row;
            }
            echo json_encode($list);
            exit();
        } else {
            $msg = array("status" => "0", "message" => "No Data Found");
            echo json_encode($msg);
        }
    }

    public function addUser($data)
    {
        $this->name = $data["name"];
        $this->email = $data["email"];

        if (!empty($data)) {
            $result = $this->db->query("INSERT INTO $this->tableName(name,email) VALUES ('$this->name','$this->email');");

            if ($result) {
                $msg = array("status" => "1", "message" => "1 User Added Succesfully");
                echo json_encode($msg);
            } else {
                $error = array("status" => "0", "message" => "User Insertion Failed");
                echo json_encode($error);
            }
        } else {
            $error = array("status" => "0", "message" => "User Name is Mandatory");
            echo json_encode($error);
        }

    }
    public function updateUser($data)
    {
        $this->name = $data["name"];
        $this->email = $data["email"];

        if (!empty($data)) {
            $result = $this->db->query("UPDATE $this->tableName SET name=$this->name");

            if ($result) {
                $msg = array("status" => "1", "message" => "1 User UPDATED Succesfully");
                echo json_encode($msg);
            } else {
                $error = array("status" => "0", "message" => "User Updated Failed");
                echo json_encode($error);
            }
        } else {
            $error = array("status" => "0", "message" => "User Name is Mandatory");
            echo json_encode($error);
        }

    }

    public function deleteUser($data)
    {
        $this->name = $data["name"];


        $result = $this->db->query("DELETE FROM $this->tableName WHERE name=$this->name");

        if ($result) {
            $msg = array("status" => "1", "message" => "1 User DELETED Succesfully");
            echo json_encode($msg);
        } else {
            $error = array("status" => "0", "message" => "User DELETED Failed");
            echo json_encode($error);
        }

    }
}
?>