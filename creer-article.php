<!-- - Une page permettant de créer des articles creer-article.php :
Cette page possède un formulaire permettant "AUX MODERATEURS" et aux
"ADMINISTRATEURS" de "CREER DE NOUVEAUX ARTICLES". 
Le formulaire contient donc le texte de l’article, une liste déroulante contenant les catégories existantes
 en base de données et un bouton submit.  -->

<?php
require('connect.php');
session_start();

if (isset($_SESSION['user']['id_droits']) == 1337 || isset($_SESSION['user']['id_droits']) == 42) {

    $msg = '';

    // ***************si user appyuie sur bouton submit***************
    if (isset($_POST['submit'])) {

        // *************et si le champ cat et article est correctement rempli**********
        if (!empty($_POST['article']) && ($_POST['categorie'])) {

            $article = $_POST['article'];
            $id_user = $_SESSION['user']['id'];
            $cat = $_POST['categorie'];

            // **************insére l'article dans ma base de données*************
            $requete2 = mysqli_query($bdd, "INSERT INTO articles(article,id_utilisateur,id_categorie,date) VALUES ('$article', '$id_user',
            '$cat', NOW())");
            // *************recup du résultat et affiche dans articles.php**************
            $resultat = mysqli_fetch_all($requete2, MYSQLI_ASSOC);

            // header("Location: articles.php");

            echo $msg = 'Article bien posté';
        } else {

            echo $msg = 'Veuillez remplir tout les champs';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Créer article</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <main>

        <form action="creer-article.php" method="post" class="form-art">

            <select name="categorie" class="selectcreer">
                <option value="">Choisir une catégorie</option>
                <option value="1">Cinéma</option>
                <option value="2">Séries</option>
                <option value="3">Animation</option>
            </select>


            <div class="box-art">

                <h1 class="h1art"> Publication de l'article </h1>

                <textarea name="article" class="area-art" placeholder="Publie ton article  ..." required></textarea>

                <div class="buttonart">
                    <input class="inputart" type="submit" value="Publier" name="submit" action="post" required />
                </div>
                <?php ?>

        </form>

    </main>
    <?php include 'footer.php'; ?>
</body>

</html>