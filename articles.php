<!-- - Une page contenant les articles (articles) :

Sur cette page, les utilisateurs peuvent voir "L'ENSEMBLE DES ARTICLES", 
triés du plus récents au plus anciens.

S’il y a plus de 5 articles, seuls les 5 premiers
sont affichés et un système de pagination permet d’afficher les 5 suivants
(ou les 5 précédents). Pour cela, il faut utiliser l’argument GET “start”.
ex : https://localhost/blog/articles.php/?start=5 affiche les articles 6 à 10.

La page articles peut également filtrer les articles par catégorie à l’aide de
l’argument GET “categorie” qui utilise les id des categories.
ex : https://localhost/blog/articles.php/?categorie=1&start=10 affiche les
articles 11 à 15 ayant comme id_categorie 1). 


//// Petit resumé personnel

- SYSTEME DE PAGINITION = Affichage des 5 articles

Les autres articles seront dans page 2, 3, 4 ...

 avec 

- SYSTEME DE TRIE

Trie des articles par catégorties (par ID)       -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main style="border:2px solid pink; padding: 30px; height: 50vh; margin-bottom: 5px;">

    </main>

    <?php include 'footer.php'; ?>


</body>

</html>