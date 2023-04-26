<?php
session_start();

// Pokud byl formulář odeslán
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Získání přihlašovacích údajů z formuláře
  $login = $_POST['username'];
  $heslo = $_POST['password'];

  // Porovnání přihlašovacích údajů s uloženými údaji v databázi nebo souboru
  if ($login == 'admin' && $heslo == '123') {
    // Vytvoření relace pro přihlášeného uživatele
    $_SESSION['username'] = $login;
    // Přesměrování na hlavní stránku
    header('Location: pagefirma.php');
    exit();
  } else {
    // Zobrazení chybové zprávy
    $errorMessage = '<p style="color:red">Chybné přihlašovací údaje.</p>';

  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin_login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <script src="login_script.js"></script>
    <div class="center">
        <form method="post" action="admin_login.php">
            <h2>Den firem přihlášení (admin)</h2>
            <div class="txt_field">
                <label for="username">Zadejte Váš E-mail:</label>
                <input type = "text" placeholder="E-mail" id="username" name="username" required>
            </div>

            <div class="txt_field">
                <label for="password">Zadejte heslo:</label>
                <input type = "password" placeholder="Heslo" id="password" name="password" required>
            </div>

            <div>
                <?php
                if (isset($errorMessage)) {
                    echo $errorMessage;
                }
                ?>
                <input type="submit" value="Přihlásit se" class="login_btn">

            </div>
    </div>


    <div class="footer">
        <p>FOOTER</p>
    </div>

</body>
</html>