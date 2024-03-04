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
       <h1>Wybierz działanie</h1> 
            <a href="./actions/addComputer.php">Dodaj komputer</a>
            <a href="./actions/userComputers.php">Zobacz swoje komputery</a>


    </div>
        
        
</body>
</html>