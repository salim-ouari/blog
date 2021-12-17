<?php

// ***********************bdd plesk***********************
// $bdd = mysqli_connect('localhost', 'salim-ouari2', "Zidane07@", 'salim-ouari_livre-or');

//   **********************bddlocal***********************
$bdd = mysqli_connect('localhost', 'root', '', 'blog');
mysqli_set_charset($bdd, 'utf8');
