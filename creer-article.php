<!-- - Une page permettant de créer des articles (creer-article.php) :

Cette page possède un formulaire permettant "AUX MODERATEURS" et aux
"ADMINISTRATEURS" de "CREER DE NOUVEAUX ARTICLES". 

Le formulaire contient donc le texte de l’article, une liste déroulante contenant les catégories existantes
en base de données et un bouton submit. 

//// Petit resumé personnel
Le modérateur (42) et l'administrateur (1337) 
pourrons créer un article qui va s'insérer dans la page des articleS
(Une page qui va ressembler à la page commentaire du livre d'or)  -->

<?php
session_start();
var_dump($_SESSION['user']['id_droits']);

// connecte toi à la bdd
require('connect.php');
$error = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['comment'])) {
        $comment = $_POST['comment'];
        $id = $_SESSION['user']['id_droits'];
        $requete = mysqli_query($bdd, "INSERT INTO articles(article, id_utilisateur, date) VALUES ('$comment', '$id', NOW())");
        header('articles.php');
    } else {
        $error = 'veuillez remplir le champs';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Créer article</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="main-com" style="border:2px solid pink; padding: 30px; height: 50vh; margin-bottom: 5px;">

        <div class="container">
            <h1 class="comh1">POST TON ARTICLE !!!</h1>
            <p id="postcom">N’hésite pas à utiliser ce formulaire pour poster un article qui apparaîtra sur la page articles !</p>
            <form action="" method="post">

                <div class="bloc-com">
                    <label for="comment">Votre article</label>
                    <textarea id="message" name="comment" placeholder="Ecrivez ici..." required></textarea>
                </div>
                <div class="poster">
                    <button type="submit" name="submit" id="comm">Poster</button>
                </div>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>