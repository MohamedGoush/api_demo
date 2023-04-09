<?php

include("./db.php");

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

echo $name . "<br>", $email . "<br>", $phone . "<br>";

?>