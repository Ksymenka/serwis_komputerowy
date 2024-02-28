<?php

$servername = "127.0.0.1"; 
$username = "Admin";
$password = "!QAZ2wsx";
$db_name = "serwis_komputerowy";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection error". $conn->connect_error);
}

$login = $conn -> real_escape_string($_POST["login"]);
$password = $conn -> real_escape_string($_POST["password"]);

$sql = "SELECT email FROM uzytkownik WHERE email=$login";
$result = $conn -> query($sql);

