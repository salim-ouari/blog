<!-- - Une page d’accueil (index.php).

Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir
un lien vers la page articles. -->

<!-- <?php
        session_start();
        ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <main>

    <h2  class="h2index">Découvrez vitte <a class="a-index" href="articles.php"> les articles</a> de notre blog ! </h2>

    </main>

    <?php include 'footer.php'; ?>


</body>

</html>