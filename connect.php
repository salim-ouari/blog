<?php

// ********BDD-PLESK****************
// $bdd = mysqli_connect('localhost', 'salim-ouari2', "Zidane07@", 'salim-ouari_livre-or');


// //   *******BDD-LOCAL (PDO) ***************  
// $bdd = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
// $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// $bdd->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);



//   *******BDD-LOCAL (MSQLI) ****************
$bdd = mysqli_connect('localhost', 'root', '', 'blog');
mysqli_set_charset($bdd, 'utf8');








