<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $login = $_POST['username'];
  $heslo = $_POST['password'];

  if ($login == 'admin' && $heslo == '123') {
    $_SESSION['username'] = $login;

    header('Location: pagefirma.php');
    exit();
  } else {

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