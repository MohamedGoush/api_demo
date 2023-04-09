<?php

header("access-control-allow-origin:*");

require("./database/database.php");
require("./model/userModel.php");

$database = new Database();
$db = $database->dbConnection();
$userModel = new UserModel($db);


$request = $_SERVER["REQUEST_METHOD"];
// $id = $_REQUEST["id"] ?? null;
$name = $_REQUEST["name"] ?? null;

switch ($request) {
    case 'GET':
        header("access-control-allow-methods: GET");
        // echo $request;
        if (!$name) {
            $userModel->fetchAllUser();
        }
        $userModel->fetchSingleUser($name);
        break;
    case 'POST':
        header("access-control-allow-methods: POST");
        // echo $request;
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        // echo json_encode($data);
        $userModel->addUser($data);
        break;
    case 'PUT':
        header("access-control-allow-methods: PUT");
        // echo $request;
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        // echo json_encode($data);
        $userModel->updateUser($data);
        break;
    default:
        echo '{"status : 0", "message:Not Allowed"}';
        break;
}

?>