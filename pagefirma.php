<?php

    $connect = new mysqli("localhost", "2009010276", "3ddkqc2v", "2009010276") or die("Chyba - nepodařilo se načíst db");
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
        <a href="zobrazeniFirem.php"><button type="button" class="side_button">Zobrazit firmy</button></a>
        <a href="zobrazeniBloku.php"><button type="button" class="side_button" >Bloky firem</button></a>
        <a href="pagefirma.php"><button type="button"  class="side_button_chosen" >Přidat firmu</button></a>
    </div>
    <div class="center">
        <form method="post">
            <h2>Přidání firmy</h2>
            <div class="txt_field">
                <label>Zadejte název firmy:</label>
                <input type = "text" placeholder="Název firmy" required>
            </div>
            <div class="txt_field">
                <label>Název prezentace:</label>
                <input type = "text" placeholder="Příjmení" required>
            </div>
            <div class="txt_field">
                <label>O firmě:</label>
                <input type = "text" placeholder="Informace o firmě" required>
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
                <input type="button" value="Přidat" class="login_btn" onclick=location.href="">
            </div>
    </div>

</body>
</html>