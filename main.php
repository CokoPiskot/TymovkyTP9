<?php

    $connect = new mysqli("localhost", "2009010541", "ab0lpiDD", "2009010541") or die("Chyba - nepodařilo se načíst db");
    $connect -> set_charset("UTF8") or die("Chyba -  chyba kodování");

    $result = $connect -> query("INSERT INTO Firma (idFirma, nazev, Ucebna_idUcebna) VALUES (2, '2KGAMES', 2)");

    $connect -> close();
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
</head>
<body>
    <div class = "sidebar">
            <input type="button" value="Zobrazit firmy" class="side_button">
            <input type="button" value="Bloky firem" class="side_button">
    </div>
    <div class="company_table">
            <input type="button" value="Firma A" class="company_Button">
            <input type="button" value="Firma B" class="company_Button">
            <input type="button" value="Firma C" class="company_Button">
    </div>
    <div class="settings">
        <input type="button" value="Přidat firmu" class="add_button">
        <input type="button" value="Odstranit firmu" class="del_button">
    </div>

</body>
</html>