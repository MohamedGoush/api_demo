<?php

// This is DB is Connected to the Upwork Projects Sample

$hostName = "localhost";
$userName = "u384900722_upwork";
$password = "Sunwukongjoker7";
$dbName = "u384900722_upwork_db";

$con = new mysqli($hostName, $userName, $password, $dbName);

if ($con->connect_errno) {
    printf("failed Database Connect", $con->connect_errno);
    exit();
} else {
    echo "Connection SuccessFully";
}
?>