<?php

include("./db.php");

$query = $con->query("SELECT * FROM user_details");

$result = array();

while ($rawData = $query->fetch_assoc()) {
    $result[] = $rawData;
}

echo json_encode($result);

?>