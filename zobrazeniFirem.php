<?php

    $connect = new mysqli("localhost", "2009010276", "3ddkqc2v", "2009010276") or die("Chyba - nepodařilo se načíst db");
    $connect -> set_charset("UTF8") or die("Chyba -  chyba kodování");


    if (isset($_POST["nazevFirmy"])) {
        $query = $connect->query($sql);
        $sql = "SELECT idFirma FROM `Firma` WHERE nazev = '$input1' AND název_prezentace = '$input2'";
        $query = $connect->query($sql);
        while($row = $query -> fetch_object()) {
            $id = $row -> idFirma;
        }
        echo $id;
    }

    $connect->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pageFirma.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewPanel</title>
</head>
<body>
    <script src="script.js"></script>
    <div class = "sidebar">
        <a href="zobrazeniFirem.php"><button type="button" class="side_button">Zobrazit firmy</button></a>
        <a href="zobrazeniBloku.php"><button type="button" class="side_button" >Bloky firem</button></a>
        <a href="pagefirma.php"><button type="button"  class="side_button" >Přidat firmu</button></a>
    </div>
    <div class="center">
        <h1>Zobrazeni firem</h1>
    </div>
</body>
</html>