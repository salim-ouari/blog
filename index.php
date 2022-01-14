<!-- - Une page d’accueil (index.php).

Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir
un lien vers la page articles. -->

<?php
session_start();

include('connect.php');

// //requête de récupération des informations d'affichage de l'article concerné,
// $requete_art = mysqli_query($bdd, "SELECT article, DATE_FORMAT(date, '%d/%m/%Y') AS 'date', DATE_FORMAT(date, '%H:%i:%s') AS 'heure' FROM articles ORDER BY 'date' DESC LIMIT 3");
// $result_art = mysqli_fetch_array($requete_art, MYSQLI_ASSOC);

// //*****************requête de récupération des informations de l'user ayant posté cet article*********************
// $requete_art_user = mysqli_query($bdd, "SELECT utilisateurs.id, utilisateurs.login FROM articles INNER JOIN utilisateurs ON utilisateurs.id = id_utilisateur ORDER BY 'date' DESC LIMIT 3 ");
// $result_art_user = mysqli_fetch_array($requete_art_user, MYSQLI_ASSOC);

// //*****************requête de récupération des informations de la catégorie de l'article*****************************
// $requete_art_cat = mysqli_query($bdd, "SELECT categories.id , categories.nom FROM categories INNER JOIN articles ON categories.id = articles.id_categorie ORDER BY 'date' DESC LIMIT 3");
// $result_art_cat = mysqli_fetch_array($requete_art_cat, MYSQLI_ASSOC);
// var_dump($result_art_user);

$requete = mysqli_query($bdd, "SELECT * FROM articles ORDER BY 'date' ASC LIMIT 3 ");
$result = mysqli_fetch_all($requete, MYSQLI_ASSOC);

?>

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
        <h2 class="h2index">Découvrez vite <a class="a-index" href="articles.php"> les articles</a> de notre blog ! </h2>

        <section class="container">

            <?php foreach ($result as $key) {
            ?>

                <div class="box">

                    <div class="divimg"><img src="asset/butt.jpg" alt="image clap movies"></div>

                    <h3 class="h3ny">article</h3>
                    <div class="paratitre">

                        <p><?= substr($key['article'], 0, 200) ?></p>
                        <p><?= $key['date'] ?></p>
                        <p><?php echo '<a href="article.php?id=' . $key['id'] . '"">Lire article</a>'; ?></p>
                    </div>
                </div>

            <?php    } ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>