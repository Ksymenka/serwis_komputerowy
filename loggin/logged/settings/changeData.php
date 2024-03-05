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
        <a href="../settings.php">Ustawienia użytkownika <?php echo $username ?></a> 
        <a href="news.html">Wiadomości</a>
    </header>

    <form action="./changeData.php" method="post">
        <p><input id="imie" type="text" placeholder="Imię" name="imie"></p>
        <p><input id="nazwisko" type="text" placeholder="Nazwisko" name="nazwisko"></p>
        <p><input id="email" type="email" name="email" autocomplete="username" placeholder="Adres e-mail"></p>
        <p><input type="number" style="width: 95%;" name="nr_tel" id="nr_tel" maxlength="9" placeholder="Numer telefonu" min="0"></p>
        <p><input id="password" autocomplete="new-password" type="password" name="haslo" placeholder="Hasło"></p>
        <p><input id="submit" type="submit" value="Zaktualizuj dane"></p>
        <p id="err">               
        <?php
        $servername = "127.0.0.1"; 
        $username = "Admin";
        $password = "!QAZ2wsx";
        $db_name = "serwis_komputerowy";
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        $username = $_COOKIE['Username'];
        $id = $conn -> query("SELECT id FROM uzytkownik WHERE email='$username'");
        
        $options = [
            'cost' => 12,
        ];
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
        $isEmpty = false;
        foreach ($_POST as $field) {
            if (empty($field)) {
                echo "Pole", $field, " nie może być puste !<br>";
                $isEmpty = true;
            }
        }
        if (!$isEmpty) {
            $imie = $conn -> real_escape_string($_POST['imie']);    
            $nazwisko = $conn -> real_escape_string($_POST['nazwisko']);    
            $email = $conn -> real_escape_string($_POST['email']);    
            $nr_tel = $conn -> real_escape_string($_POST['nr_tel']);    
            $haslo = password_hash($conn -> real_escape_string($_POST['haslo']), PASSWORD_DEFAULT, $options);    
            
            if(checkIfExist($conn, $email)) {
                $sql = "UPDATE `uzytkownik` SET imie='$imie', nazwisko='$nazwisko', email='$email', nr_tel='$nr_tel', haslo='$haslo' WHERE id='$id'";

                if ($conn -> query($sql) === TRUE) {
                    echo "Zaktualizowano dane";
                    $conn -> close();
                    header("Location: ../user.php");
                    exit();
                } else {
                    echo "Błąd: " . $sql . "<br>" . $conn->error;
                }
            }
            }
         ?>
        </p>

    </form>
</body>
</html>