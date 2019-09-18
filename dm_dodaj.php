<?php 
session_start();
require_once 'dm_konekcija.php';

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

if(!isset($_SESSION['id'])) 
{
    header('Location: dm_login.php');
}
$id = $_SESSION['id'];

if(!empty($_GET['dodaj'])) {

    $pid = $conn->real_escape_string($_GET['dodaj']);

    // $id - onaj koji salje zahtev
    // $pid - onaj koji prima zahtev

    //Provera da li pracenje postoji

    $sql = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
    $result = $conn->query($sql);

    if($result->num_rows == 0) {
        // dodaje se pracenje tek kada ne postoji
        $sql1 = "INSERT INTO prijatelji (korisnik_id, prijatelj_id) VALUE ($id, $pid)";
        $result1= $conn->query($sql1);
    }
    // header('Location: dm_prijatelji1.php');
    header('Location: vezbaUpitPrijateljiOOP.php');
    
}





?>