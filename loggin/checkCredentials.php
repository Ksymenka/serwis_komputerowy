<?php
$servername = "127.0.0.1"; 
$username = "Admin";
$password = "!QAZ2wsx";
$db_name = "serwis_komputerowy";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection error". $conn->connect_error);
}

$options = [
    'cost' => 12,
];

$name = $conn -> real_escape_string($_POST["imie"]);
$surname = $conn -> real_escape_string($_POST["nazwisko"]);
$nr_tel1 = $conn -> real_escape_string($_POST["nr_tel1"]);
$nr_tel2 = $conn -> real_escape_string($_POST["nr_tel2"]);
$nr_tel3 = $conn -> real_escape_string($_POST["nr_tel3"]);
$email = $conn -> real_escape_string($_POST['email']);
$nr_tel = $nr_tel1 . $nr_tel2 . $nr_tel3;
$password = password_hash($conn -> real_escape_string($_POST["haslo"]), PASSWORD_DEFAULT, $options) ;

echo $name, $surname, $nr_tel,"<br>", $password;

$sql = "INSERT INTO uzytkownik(imie, nazwisko, nr_tel, email, typ_konta, haslo) VALUES ('$name', '$surname', '$nr_tel', '$email', 1, '$password')";
$conn -> close();

header("Location: ./login.html");
?>