<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="../index.html">Strona główna</a>
        <a href="./login.html">Zaloguj się ponownie</a>
        <a href="./registration.html">Zarejestruj się</a>
    </header>
    <div class=content>
        <h1>Podano błędne hasło lub login</h1>
    </div>
<?php
$servername = "127.0.0.1"; 
$username = "Admin";
$password = "!QAZ2wsx";
$db_name = "serwis_komputerowy";

$conn = new mysqli($servername, $username, $password, $db_name);

function validatePassword($conn, $user, $password) {
    $hashedPassword = null;
    $stmt = $conn->prepare("SELECT haslo FROM uzytkownik WHERE email = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    return password_verify($password, $hashedPassword);
}

function validateUser($conn, $user) {
    $returnedLogin = null;
    $stmt = $conn -> prepare("SELECT email FROM uzytkownik WHERE email = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($returnedLogin);
    $stmt->fetch();
    $stmt->close();
    
    return $returnedLogin == $user;
}

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$login = $conn->real_escape_string($_POST["login"]);
$haslo = $conn->real_escape_string($_POST["haslo"]);

if (validateUser($conn, $login) && validatePassword($conn, $login, $haslo)) {
    $typ_konta = null;
    $stmt = $conn->prepare("SELECT typ_konta FROM uzytkownik WHERE email = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->bind_result($typ_konta);
    $stmt->fetch();
    $stmt->close();
    
    setcookie("Username", $login, time() + (86400 * 30), "/");
    switch ($typ_konta) {
        case 1:
            header("Location: ./logged/user.php");
            break;
        case 2:
            header("Location: ./logged/worker.php");
            break;
        case 3:
            header("Location: ./admin.php");
            break;
        default:
            header("Location: ./notFound");
            break;
    }
} 
$conn->close();
?>
</body>
</html>
