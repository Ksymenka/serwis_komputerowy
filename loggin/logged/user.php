<?php
if (!isset($_COOKIE['Username'])) {
    header("Location: ../login.php");
    exit();
}
$username = $_COOKIE["Username"];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Strona główna</title>
</head>
<body>
    <header>
            <a href="./settings.php">Ustawienia użytkownika <?php echo $username ?></a> 
            <a href="news.html">Wiadomości</a>
    </header>

    <div class="content">

    </div>
        
        
</body>
</html>