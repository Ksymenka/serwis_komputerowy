<?php
if (!isset($_COOKIE['Username'])) {
    header("Location: /index.html");
    exit();
}
$username = $_COOKIE['Username'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Dodaj komputer</title>
</head>
<body>
    <header>
        <a href="../user.php">Strona główna</a> 
        <a href="../../news.html">Wiadomości</a>
    </header>

    <div class="content">
        <h1>Dodaj nowy komputer</h1>

        <form action="./addComputer.php" method="post" style="padding: 15px;">
            <input type="text" placeholder="Producent" name="vendor" style="margin-bottom: 5px;">
            <input type="text" placeholder="Opisz swój problem" name="problem">
            <div style="display: flex; flex-direction: row;">
                <input type="radio" name="typ" id="1" value="1">
                <label for="1">Komputer</label>
                <input type="radio" name="typ" id="2" value="2">
                <label for="2">Laptop</label>
                <input type="radio" name="typ" id="3" value="3">
                <label for="3">Telefon</label>
            </div>
            <input type="submit" value="Dodaj komputer">
            <p id="err"></p>
            <script src="./validate.js"></script>
            <?php
            $servername = "127.0.0.1"; 
            $username = "Admin";
            $password = "!QAZ2wsx";
            $db_name = "serwis_komputerowy";
            
            $conn = new mysqli($servername, $username, $password, $db_name);

            if($conn ->connect_error) {
                die("Connection error" . $conn ->connect_error);
            }

            $vendor = $conn -> real_escape_string($_POST['vendor']);
            $problem = $conn -> real_escape_string($_POST['problem']);
            $type = $_POST['typ'];
            $currentDate = date("Y/m/d");

            $username = $_COOKIE["Username"];
            $id = $conn -> query("SELECT `id` FROM `uzytkownik` WHERE email='$username'");
            $row = $id-> fetch_assoc();
            $id = $row['id'];

            $sql = "INSERT INTO `sprzet`(`producent`,`problem`,`data_pobrania`,`typ_sprzetu`, `wlasciciel`) VALUES('$vendor', '$problem', '$currentDate', '$type', '$id')"; 
            if ($conn -> query($sql) === TRUE) {
                echo "Dodano nowy komputer";
            } else {
                echo "Błąd, nie dodano nowego komputera";
            }
            $conn -> close();
            ?>
        </form>
    </div>
</body>
</html>