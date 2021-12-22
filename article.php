<!-- - Une page contenant un article et ses commentaires (article.php) :
Cette page permet de "VOIR UN ARTICLE", l’ensemble des commentaires
associés et la possibilité "D'EN AJOUTER UN NOUVEAU". 
Il faut utiliser l’argument GET “id” afin de sélectionner l’article souhaité.
ex : https://localhost/blog/article.php/?id=1 


//// Petit resumé personnel

Une page qui va détailler la page "articleS",  
Quand je clique sur un article parmis les articles, il va apparaître un href vers "article" ça va me detailler l'article  
avec les commentaires des utilisateurs -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <main style="border:2px solid pink; padding: 30px; height: 50vh; margin-bottom: 5px;">

    </main>

    <?php include 'footer.php'; ?>

</body>

</html>