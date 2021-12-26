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
require('connect.php');
session_start();

if (isset($_SESSION['user']['id_droits']) == 1337 || isset($_SESSION['user']['id_droits']) == 42) {

    // ************sélect la liste des catégories****************
    $requete = mysqli_query($bdd, "SELECT * FROM 'categories'");
    $result = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    if (isset($_GET['submit'])) {
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>créer article</title>
    </head>

    <body>

    </body>

    </html>

<?php }
