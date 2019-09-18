<?php
session_start();

require_once 'dm_konekcija.php';

// Podesavanje id logovanog korisnika 
if (!isset($_SESSION['id'])) {
    header('Location: dm_login.php');
}
$id = $_SESSION['id'];


?>

<html>

<head>
    <link rel="stylesheet" href="mrezaStyle.css">
    
</head>

<body>
    <header>
        <ul>
            <li class='navi'><a href="indexx.php" target="_blank">HOME</a></li>
            <li class='navi'><a href="dm_profil.php" target="_blank">PROFIL</a></li>
            <li class='navi'><a href="vezbaUpitPrijateljiOOP.php" target="_blank">PRIJATELJI</a></li>
            <li class='navi'><a href="formaZaEditovanjeProfila.php" target="_blank">IZMENI PROFIL</a></li>
            <li class='navi'><a href="dm_promeniSifru.php" target="_blank">IZMENI ŠIFRU</a></li>
            <li class='navi'><a href="dm_logout.php" target="_blank">LOGOUT</a></li>
            
            


        </ul>
        <header>
            <hr>

                <!-- ne zatvaramo body i html tag!!!! -->