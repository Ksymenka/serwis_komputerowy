<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../style.css">
    <title>Zmień swoje dane</title>
</head>
<body>
    <header>
        <a href="./settings.php">Ustawienia użytkownika <?php echo $username ?></a> 
        <a href="news.html">Wiadomości</a>
    </header>

    <form action="./changeData.php" method="post">
        <p><input id="imie" type="text" placeholder="Imię" name="imie"></p>
        <p><input id="nazwisko" type="text" placeholder="Nazwisko" name="nazwisko"></p>
        <p><input id="email" type="email" name="email" autocomplete="username" placeholder="Adres e-mail"></p>
        <p><input type="number" style="width: 95%;" name="nr_tel" id="nr_tel" maxlength="9" placeholder="Numer telefonu" min="0"></p>
        <p><input id="password" autocomplete="new-password" type="password" name="haslo" placeholder="Hasło"></p>
        <p><input id="repeatPassword" autocomplete="new-password" type="password" placeholder="Powtórz hasło"></p>
        <p><input id="submit" type="submit" value="Zarejestruj się"></p>
        <p id="err"></p>               
    </form>
    
    <script src="../registration.js"></script>
    
</body>
</html>