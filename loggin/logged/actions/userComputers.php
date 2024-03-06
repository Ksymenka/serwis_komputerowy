<?php
if (!isset($_COOKIE['Username'])) {
    header("Location: /index.html");
    exit();
}
$username = $_COOKIE['Username'];

$servername = "127.0.0.1"; 
$adminname = "Admin";
$password = "!QAZ2wsx";
$db_name = "serwis_komputerowy";

$conn = new mysqli($servername, $adminname, $password, $db_name);

if($conn ->connect_error) {
    die("Connection error" . $conn ->connect_error);
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Zobacz komputery</title>
</head>
<body>
    <header>
        <a href="../user.php">Strona główna</a> 
        <a href="../../news.html">Wiadomości</a>
    </header>

    <div class="content">
        <h1>Twoje komputery: </h1>
        <table border="1">
        <tr>
            <th>Producent</th>
            <th>Problem</th>
            <th>Stan</th>
            <th>Data pobrania</th>
            <th>Data wydania</th>
            <th>Typ sprzętu</th>
        </tr>
        <?php
        $id_result = $conn -> query("SELECT id FROM uzytkownik WHERE email='$username'");
        $row = $id_result->fetch_assoc();
        $id = $row["id"];
        $eq_result = $conn -> query("SELECT * FROM sprzet WHERE wlasciciel=$id");
        $row = $eq_result->fetch_assoc();

        if ($eq_result -> num_rows > 0) {
            while ($row = $eq_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>", $row['producent'], "</td>"; 
                echo "<td>", $row['problem'], "</td>"; 
                echo "<td>", $row['stan'], "</td>"; 
                echo "<td>", $row['data_pobrania'], "</td>"; 
                echo "<td>", $row['data_wydania'], "</td>"; 
                $typ_sprzetu = "";

                switch($row['typ_sprzetu']){
                    case "1":
                        $typ_sprzetu = "Komputer";
                        break;
                    case "2":
                        $typ_sprzetu = "Laptop";
                        break;
                    case "3":
                        $typ_sprzetu = "Telefon";
                        break;
                }
                echo "<td>", $typ_sprzetu, "</td>";
            }
        } else {
            echo "Nie dodałeś żadnego komputera";
        }
        $conn -> close();
        ?>
        </table>
    </div>
</body>
</html>