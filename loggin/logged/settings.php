<?php
if (!isset($_COOKIE['Username'])) {
    header("Location: /index.html");
    exit();
}
$username = $_COOKIE['Username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Ustawienia</title>
</head>
<body>
    <header>
        <a href="./user.php">Strona główna</a> 
        <a href="../news.html">Wiadomości</a>
    </header>

    <div class="content">
        <a href="./settings/changeData.php">Zmień swoje dane</a>
    </div>

    
</body>
</html>