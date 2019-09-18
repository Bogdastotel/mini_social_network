<?php
// session_start();
// require_once 'dm_konekcija.php';
require_once 'dm_header.php';

// konekcija na bazi 
// $servername = "localhost";
// $username = "admin";
// $password = "admin123";
// $database = "mreza";

// // objekat konekcije

// $conn = new mysqli($servername, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Neuspela konekcija! Razlog: " . $conn->connect_error);
// }

// $conn->set_charset("utf8");

// Podesavanje id logovanog korisnika 
if (!isset($_SESSION['id'])) {
    header('Location: dm_login.php');
}
$id = $_SESSION['id'];

// kad god se dohvata vrednost iz GET ili POST trebalo bi da se pozove real_escape_string 
// $id-logovan korisnik (koji salje zahtev)
// $pid - korisnik kojem se salje zahtev 

if (!empty($_GET['id'])) {
    $pid = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM prijatelji 
    WHERE korisnik_id = $id AND prijatelj_id = $pid";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql1 = "INSERT INTO prijatelji (korisnik_id, prijatelj_id) 
        VALUE ($id, $pid)";
        $conn->query($sql1);
    }
}

// PITATI ODAKLE NAM PARAMETAR 'id' u GET????

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mrezaStyle.css">
    <title>Document</title>
    
</head>

<!-- <body>

    <header>
        <ul>
            <li class='navi'><a href="indexx.php" target="_blank">HOME</a></li>
            <li class='navi'><a href="vezbaUpitPrijateljiOOP.php" target="_blank">PRIJATELJI</a></li>
            <li class='navi'><a href="formaZaEditovanjeProfila.php" target="_blank">EDIT</a></li>
            <li class='navi'><a href="dm_logout.php" target="_blank">LOGOUT</a></li>

        </ul>
    <header>

            <hr> -->
        <div class="logo">
        <h1>IT social network</h1>
        <img src="images/svetce.png" width="200" alt="">
        
        </div>
       
            <?php
            // prikazi sve korisnike koji nisu ja

            $sql = "
    SELECT k.id AS id, k.username AS username, p.ime AS ime, p.prezime AS prezime, p.pol AS pol FROM korisnici AS k 
    INNER JOIN profili AS p 
    ON k.id = p.korisnik_id
    WHERE k.id != $id
    ORDER BY p.ime, p.prezime
    ";

            $result = $conn->query($sql);

          
            echo "<hr>";


            $result = mysqli_query($conn, $sql);
            if ($result != false) {
                $red = mysqli_fetch_assoc($result);
                echo "<table>";
                echo "<tr>";
                echo "<th>Ime</th>";
                echo "<th>Prezime</th>";
                echo "<th>Pol</th>";
                echo "<th>Korisnicko ime</th>";
                echo "<th>Svojstva</th>";
                echo "<th>Akcija</th>";
                echo "</tr>";

                while ($red = mysqli_fetch_assoc($result)) {    
                    $pid = $red['id'];
                    echo "<tr>";
                    echo "<td>" . "<a href='dm_profil.php?id=$pid'>" . $red['ime'] .  "</a>" . "</td>";
                    echo "<td>" . "<a href='dm_profil.php?id=$pid'>" . $red['prezime'] .  "</a>" . "</td>";
                    echo "<td>" . $red["pol"] . "</td>";
                    echo "<td>" . $red["username"] . "</td>";

                    $pid = $red['id'];

                    $sql1 = "
                SELECT * FROM prijatelji WHERE korisnik_id = $id 
                AND prijatelj_id = $pid
                ";
                    $result1 = $conn->query($sql1);
                    $jatebe = $result1->num_rows;  // 0 ili 1

                    $sql2 = "
                 SELECT * FROM prijatelji WHERE korisnik_id = $pid
                 AND prijatelj_id = $id
                 ";

                    $result2 = $conn->query($sql2);

                    $timene = $result2->num_rows; // 0 ili 1
                    echo "<td>";
                    if ($jatebe + $timene > 1) {
                        echo " uzajamni prijatelji";
                        echo "<td>";
                        echo "<a href='dm_brisi.php?brisi=$pid'> ";
                        echo " Brisi pracenje";
                        echo "</a>";
                        echo "</td>";
                    } elseif ($jatebe) {
                        echo " pratim korisnika ";
                        echo "<td>";
                        echo "<a href='dm_brisi.php?brisi=$pid'> ";
                        echo " Brisi pracenje";
                        echo "</a>";
                        echo "</td>";
                    } else if ($timene) {
                        echo " korisnik mene prati";
                        echo "<td>";
                        echo "<a href='dm_dodaj.php?dodaj=$pid'>";
                        echo " Prati korisnika";
                        echo "</a>";
                        echo "</td>";
                    } else {
                        echo "nikakva veza";
                        echo "<td>";
                        echo "<a href='dm_dodaj.php?dodaj=$pid'>";
                        echo " Prati korisnika";
                        echo "</a>";
                        echo "</td>";
                    }

                    echo "</tr>";
                }
                echo "</table>";
            }


            ?>




</body>