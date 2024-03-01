<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Już istnieje</title>
</head>
<body>
    <header>
        <a href="../index.html">Strona główna</a>
        <a href="./login.html">Zaloguj się</a>
        <a href="./registration.html">Zarejestruj się</a>
    </header>

<?php
$servername = "127.0.0.1"; 
$username = "Admin";
$password = "!QAZ2wsx";
$db_name = "serwis_komputerowy";

$conn = new mysqli($servername, $username, $password, $db_name);

function checkIfExist($conn, $email) {
    $dataBasemail = null;
    $stmt = $conn->prepare("SELECT email FROM uzytkownik WHERE email= ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $stmt -> bind_result($dataBasemail);
    $stmt -> fetch();
    $stmt -> close();
    
    return $dataBasemail == $email;
}

if ($conn->connect_error) {
    die("Connection error". $conn->connect_error);
}

$options = [
    'cost' => 12,
];

$name = $conn -> real_escape_string($_POST["imie"]);
$surname = $conn -> real_escape_string($_POST["nazwisko"]);
$email = $conn -> real_escape_string($_POST['email']);
$nr_tel = $conn -> real_escape_string($_POST["nr_tel"]);
$password = password_hash($conn -> real_escape_string($_POST["haslo"]), PASSWORD_DEFAULT, $options) ;

if (checkIfExist($conn, $email)) {
    header("Location: ./userAlreadyExists.html");
}


$sql = "INSERT INTO uzytkownik(imie, nazwisko, nr_tel, email, typ_konta, haslo) VALUES ('$name', '$surname', '$nr_tel', '$email', 1, '$password')";

if ($conn -> query($sql) === TRUE) {
    echo "Dodano nowego użytkownika";
} else {
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}
$conn -> close();



header("Location: ./login.html");
?>
    
</body>
</html>
