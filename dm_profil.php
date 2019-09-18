<?php

require_once 'dm_header.php';





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mrezaStyle.css">
    <title>Document</title>
</head>
<style>
.para1 {
    font-size: 24px;
    font-style: italic;
}
.blue .tdclass  {
    color: blue;
}
.pink .tdclass {
    color: pink;
}
.grey .tdclass {
    color: grey;
}
</style>
<body>
    <?php



if(!empty($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "
    SELECT * FROM profili
    WHERE korisnik_id = $id    
    ";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM korisnici WHERE id = $id";
    $result1 = $conn->query($sql1);
  
    if($result->num_rows != 0) 
    {   $red = $result->fetch_assoc();
        $red1 = $result1->fetch_assoc();

        if($red['pol'] == "M") 
        {
            echo "<table class='blue';>";
           
            echo "<tr>";
            echo "<td>";
            echo "Ime " . " ";
            echo "</td>";
            echo "<td class= 'tdclass''>";
            echo $red["ime"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Prezime " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["prezime"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Korisnicko Ime " . "";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red1["username"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Pol " . "";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["pol"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Biografija: " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["bio"];
            echo "</td>";
            echo "</tr>";
        
        echo "</table>";
       

        }
        else if ($red['pol'] == "Z") 
        {
            echo "<table class='pink';>";
           
            echo "<tr>";
            echo "<td>";
            echo "Ime " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["ime"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Prezime " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["prezime"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Korisnicko Ime " . "";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red1["username"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Pol " . "";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["pol"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Biografija: " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["bio"];
            echo "</td>";
            echo "</tr>";
        
        echo "</table>";
       
        }
        else {
            echo "<table class='grey';>";
           
            echo "<tr>";
            echo "<td>";
            echo "Ime " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["ime"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Prezime " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["prezime"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Korisnicko Ime " . "";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red1["username"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "Pol " . "";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["pol"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td >";
            echo "Biografija: " . " ";
            echo "</td>";
            echo "<td class= 'tdclass'>";
            echo $red["bio"];
            echo "</td>";
            echo "</tr>";
        
        echo "</table>";
       
        }
        


    }
    else {
        echo "<p class='para1'>" . "Ne postoji profil korisnika sa zadatim ID-jem" . "</p>";
    }
   

  
     
}
        


    ?>

</body>

</html> 
