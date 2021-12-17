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

