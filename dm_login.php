
<?php

// otvaranje sesije na pocetku skripte
session_start();
require_once 'dm_konekcija.php';

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


if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $user = $conn->real_escape_string($_POST["user"]);
    $pass = $conn->real_escape_string($_POST["pass"]);

    $sql = "
        SELECT * FROM korisnici WHERE username = '$user'
    ";
    $result = $conn->query($sql);

    if(!$result) 
    {
        echo "Upit nije dobar!";
    }
    else {
        if($result->num_rows == 0) 
        {
            echo "Ovakav korisnik ne postoji u bazi";
        }
        else 
        {
            $red = $result->fetch_assoc();
            // $red['id'], $red['username'], $red['pass']
            if(md5($pass) != $red['pass']) {
                echo "Nije doslo do poklapanje sifara";
            }
            else {
                // supeglobal variable
                $_SESSION['id'] = $red['id'];
                header('Location: indexx.php');
            }
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
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <!-- <style>
        html,
body {
    height: 100%;
}


body {
    margin: 20px;
    background: linear-gradient(45deg, #49a09d, #5f2c82);
    font-family: sans-serif;
    font-weight: 100;
    
}

div.jumbotron {
    background: linear-gradient(45deg, #3e6b6a, #542077 );
    color: wheat;
}

.formica {
  color:white;
}
    
    </style> -->
</head>
<body>

    <div class="jumbotron">
        <h2>Welcome to IT connection login form!!!</h1>
        <div class="logo">
        <h1>IT social network</h1>
        <img src="images/svetce.png" width="200" alt="">
        
        </div>
    </div>


    <form class="formica" action="dm_login.php" method="POST">
        <label for="user">Username:</label>
        <input type="text" name="user" value="">
        <br>
        <label for="pass">Password:</label>
        <input type="password" name="pass" value="">
        <br>
        <input type="submit" value="submit">


    </form>
</body>
</html>