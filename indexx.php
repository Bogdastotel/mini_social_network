<?php

require_once 'dm_header.php';
if (!isset($_SESSION['id'])) {
    header('Location: dm_login.php');
}
$id = $_SESSION['id'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        header li.navi {
            display: inline-block;
            margin-top: 20px;
            margin-left: 20px;
            list-style-type: none;
        }

        .navi a {
            text-decoration: none;
            color: white;
        }

        .navi a:hover {
            color: lightskyblue;
        }

        a {
            color: darkmagenta;
            text-decoration: none;
        }

        li,
        p {
            color: white;
            font-size: 20px;
        }


        h2 {
            margin-top: 15px;
        }

        .jumbotron  {
            margin-top: 30px;
        }
    </style>
</head>



    <div class="jumbotron">
        <header>
            <center>
                <h1>IT Social Network<h1>
                        <center>
        </header>
        <br>
    </div>
    <div class="container">
        <center>
            <h2>Connect with IT friends</h2>
            <center>

                <img src="images/svetce.png" class="mx-auto d-block" style="width:50%">
                <p>The world relies on good programmers- welcome to our network!</p>
    </div>



</body>

</html>