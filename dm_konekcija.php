<?php 


$servername = "localhost";
$username = "admin";
$password = "admin123";
$database = "mreza";

// eksplicitan nacin da se kaze kompajleru da ova promenljiva treba da bude globalna 
global $conn;

// objekat konekcijee

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Neuspela konekcija! Razlog: " . $conn->connect_error);
}

$conn->set_charset("utf8"); 




?>