<?php

    $connect = new mysqli("localhost", "2009010541", "ab0lpiDD", "2009010541") or die("Chyba - nepodařilo se načíst db");
    $connect -> set_charset("UTF8") or die("Chyba -  chyba kodování");



    $input1 = isset($_POST["nazevFirmy"]) ? $_POST["nazevFirmy"] : "";
    $input2 = isset($_POST["nazevPrezentace"]) ? $_POST["nazevPrezentace"] : "";
    $input3 = isset($_POST["oFirme"]) ? $_POST["oFirme"] : "";

    $id = rand(100, 999);

    $sql = "INSERT INTO Firma (idFirma, nazev, Ucebna_idUcebna, nazevPrezentace, oFirme) VALUES ($id, '$input1', 58, '$input2', '$input3')";

    echo $sql;

    $query = $connect->query($sql);

    echo $input1;
    echo $input2;
    echo $input3;

    $connect->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pageFirma.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
</head>
<body>
    <script src="script.js"></script>
    <div class = "sidebar">
            <input type="button" value="Zobrazit firmy" class="side_button" href="main.php">
            <input type="button" value="Bloky firem" class="side_button">
            <input type="button" value="Přidat firmu" class="side_button" href="pageFirma.html">
    </div>
    <div class="center">
        <form method="POST">
            <h2>Přidání firmy</h2>
            <div class="txt_field">
                <label>Zadejte název firmy:</label>
                <input type = "text" placeholder="Název firmy" name="nazevFirmy" required>
            </div>
            <div class="txt_field">
                <label>Název prezentace:</label>
                <input type = "text" placeholder="Název prezentace" name="nazevPrezentace" required>
            </div>
            <div class="txt_field">
                <label>O firmě:</label>
                <input type = "text" placeholder="Informace o firmě" name="oFirme" required>
            </div>
            <div class = "dropdown">
                <input type="button" value="Vybrat potřeby" class="dropbtn">
                <div class="dropdown_content">
                    <label for="ruka">Robotická ruka</label> <input type="checkbox" id="ruka"> <br>
                    <label for="projektor">Projektor</label> <input type="checkbox" id="projektor"> <br>
                    <label for="audio">Ozvučení</label> <input type="checkbox" id="audio"> <br>
                    
                </div>
            </div>
            <div class = "dropdown">
                <input type="button" value="Vybrat obor" class="dropbtn">
                <div class="dropdown_content">
                    <label for="V">Informační technologie</label> <input type="checkbox" id="V"> <br>
                    <label for="S">Sociální činnost</label> <input type="checkbox" id="S">
                    
                </div>
            </div>
            <div>
                <input type="submit" value="Přidat" class="login_btn" onclick=location.href="">
            </div>
    </div>

</body>
</html>
