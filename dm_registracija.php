 <?php

    require_once 'dm_konekcija.php';
    if (!empty($_POST)) {
        $username = $conn->real_escape_string($_POST['username']);
        $pass = $conn->real_escape_string(md5($_POST['pass']));
        $ime = $conn->real_escape_string($_POST['ime']);
        $prezime = $conn->real_escape_string($_POST['prezime']);
        $pol = $conn->real_escape_string($_POST['pol']);

        $check_if_exist = "SELECT * FROM korisnici WHERE username = '$username'";
        $resultRandom = $conn->query($check_if_exist);
        if ($resultRandom->num_rows != 0) {
            echo 'Korisnicko ime vec postoji';
        } else {
            $sql = "INSERT INTO korisnici (username, pass)
        VALUES ( '$username', '$pass')";
            $result = $conn->query($sql);
            // insert_id je poslednji id koji je upisan u bazu 
            $last_id = $conn->insert_id;
            if ($result) {
                $sql1 = "INSERT INTO profili (korisnik_id, ime, prezime, pol) 
            VALUES ($last_id, '$ime', '$prezime', '$pol')";
                $result1 = $conn->query($sql1);
            }

            if ($result1) {
                header('Location: dm_login.php');
            }
        }
    }



    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <link rel="stylesheet" href="mrezaStyle.css">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>

 <body>
     <div class="logo">
         <h1>IT social network</h1>
         <img src="images/svetce.png" width="200" alt="">
     </div>

     <form action="dm_registracija.php" method="POST">

         Ime:
         <input type="text" name='ime' placeholder="Upisite ime"><br><br>
         Prezime:
         <input type="text" name='prezime' placeholder="Upisite prezime"><br><br>
         Korisnicko ime:
         <input type="text" name='username'><br><br>
         Sifra:
         <input type="password" name='pass'><br><br>
         Pol:
         <br>
         Zenski <input type='radio' name='pol' value='Z'>
         <br>
         Muski <input type='radio' name='pol' value='M'>
         <br>
         Ostalo <input type='radio' name='pol' value='O'><br><br>
         <input type="submit" value="Potvrdi">

     </form>

 </body>

 </html>