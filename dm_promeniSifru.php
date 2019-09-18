<?php
require_once 'dm_header.php';

// da preuzmemo id logovanog korisnika

$sql = "SELECT * FROM korisnici WHERE id = $id";

$result = $conn->query($sql);

$red = $result->fetch_assoc();

// preuzimanje usesrname and password iz reda asocijativnog niza tabele korisnici (id, username, pass)

$username = $red['username'];
$pass = $red['pass'];

// varijable za span u inputu 

$passUnosStara = "*";
$passUnosNova = "*";


if(!empty($_POST)) 
{
    $staraSifra =$conn->real_escape_string($_POST['staraSifra']) ;
    $novaSifra = $conn->real_escape_string($_POST['novaSifra']);
    $potvrdaSifre = $conn->real_escape_string($_POST['potvrdaSifre']);
    $hesiranaNova = md5($novaSifra);

    
   if(md5($staraSifra) == $pass && $novaSifra == $potvrdaSifre)
   {
       // dobra stara sifra (poklapa se uneta sifra iz forme sa sifrom iz tabele korisnici)
       // moze se izvrsiti promena sifre 
       $sql1 = "UPDATE korisnici SET pass = '$hesiranaNova' WHERE id = $id";
       $conn->query($sql1);
    }
    else 
    {
        if(md5($staraSifra) != $pass) {
            // Ispis da nije ispravno uneta stara sifra 
            $passUnosStara = "Neispravno uneta stara šifra";
        }
        if($novaSifra != $potvrdaSifre) {
            // ispis da nova i potvrdjena sifra nisu iste 
            $passUnosNova = "Greška u potvrdi šifre";
        }
    }
  
}






















?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="indexStyle.css">
    <title>Document</title>
    <style>
    form {
        margin-top: 30px;
        color: white;
        width:500px;
    }
    /* input {
        float:right;
        /* margin-right: 20px; */
    /* } */
    /* .span1 {
        float: right;
    }  */
    
    </style>
</head>

<div class="logo">
        <h1>IT social network</h1>
        <img src="images/svetce.png" width="200" alt="">
        
        </div>


    
<form action="dm_promeniSifru.php" method="POST">
Korisnicko ime:
<input type="text" name='korisnickoIme' placeholder="<?php echo $username ?>" readonly><br><br>
Stara šifra:
<input type="password" name='staraSifra'>
<span class='span1'><?php echo $passUnosStara ?></span>
<br><br>
Nova šifra:
<input type="password" name='novaSifra' >
<span class='span1'><?php echo $passUnosNova ?></span>
<br><br>

Potvrda nove šifre:
<input type="password" name='potvrdaSifre' >
<span class='span1'><?php echo $passUnosNova ?></span>
<br><br>
<input type="submit" value="Potvrdi">


</form>


</body>
</html>