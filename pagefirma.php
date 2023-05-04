<?php

    $connect = new mysqli("localhost", "2009010541", "ab0lpiDD", "2009010541") or die("Chyba - nepodařilo se načíst db");
    $connect -> set_charset("UTF8") or die("Chyba -  chyba kodování");



    $input1 = isset($_POST["nazevFirmy"]) ? $_POST["nazevFirmy"] : "";
    $input2 = isset($_POST["název_prezentace"]) ? $_POST["název_prezentace"] : "";
    $input3 = isset($_POST["o_firmě"]) ? $_POST["o_firmě"] : "";

    $sql = "INSERT INTO Firma (nazev, název_prezentace, o_firmě) VALUES ('$input1', '$input2', '$input3')";


    echo $sql;

    if (isset($_POST["nazevFirmy"])) {
        $query = $connect->query($sql);
        $sql = "SELECT idFirma FROM `Firma` WHERE nazev = '$input1' AND název_prezentace = '$input2'";
        $query = $connect->query($sql);
        while($row = $query -> fetch_object()) {
            $id = $row -> idFirma;
        }
        echo $id;
    }


    echo $input1;
    echo $input2;
    echo $input3;
    if(isset($_POST['potreby'])){
        foreach($_POST['potreby'] as $potreba){
            switch($potreba) {
                case "ruka":
                    $sql = "INSERT INTO Firma_has_potřeby (Firma_idFirma, potřeby_idpotřeby) VALUES ($id, 1)";
                    $query = $connect->query($sql);
                    break;
                case "projektor":
                    $sql = "INSERT INTO Firma_has_potřeby (Firma_idFirma, potřeby_idpotřeby) VALUES ($id, 2)";
                    $query = $connect->query($sql);
                    break;
                case "audio":
                    $sql = "INSERT INTO Firma_has_potřeby (Firma_idFirma, potřeby_idpotřeby) VALUES ($id, 3)";
                    $query = $connect->query($sql);
                    break;
            }
        }
    }

    if(isset($_POST['obory'])){
        foreach($_POST['obory'] as $obor){
            switch($obor) {
                case "V":
                    $sql = "INSERT INTO Firma_has_obory (Firma_idFirma, obory_idobory) VALUES ($id, 1)";
                    $query = $connect->query($sql);
                    break;
                case "S":
                    $sql = "INSERT INTO Firma_has_obory (Firma_idFirma, obory_idobory) VALUES ($id, 2)";
                    $query = $connect->query($sql);
                    break;
            }
        }
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
                <input type = "text" placeholder="Název prezentace" name="název_prezentace" required>
            </div>
            <div class="txt_field">
                <label>O firmě:</label>
                <input type = "text" placeholder="Informace o firmě" name="o_firmě" required>
            </div>
            <div class = "dropdown">
                <input type="button" value="Vybrat potřeby" class="dropbtn">
                <div class="dropdown_content">
                    <label for="ruka">Robotická ruka</label> <input type="checkbox" id="ruka" name="potreby[0]" value="ruka"> <br>
                    <label for="projektor">Projektor</label> <input type="checkbox" id="projektor" name="potreby[1]" value="projektor"> <br>
                    <label for="audio">Ozvučení</label> <input type="checkbox" id="audio" name="potreby[2]" value="audio"> <br>
                    
                </div>
            </div>
            <div class = "dropdown">
                <input type="button" value="Vybrat obor" class="dropbtn">
                <div class="dropdown_content">
                    <label for="V">Informační technologie</label> <input type="checkbox" id="V" name="obory[0]" value="V"> <br>
                    <label for="S">Sociální činnost</label> <input type="checkbox" id="S" name="obory[1]" value="S">
                    
                </div>
            </div>
            <div>
                <input type="submit" value="Přidat" class="login_btn" onclick=location.href="">
            </div>
    </div>

</body>
</html>