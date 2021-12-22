<!-- - Une page d’accueil (index.php).

Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir
un lien vers la page articles. -->

<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main style="border:2px solid pink; padding: 30px; height: 50vh; margin-bottom: 5px;">

    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>

</html>