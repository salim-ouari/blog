<?php

$mysqli = new mysqli('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $id_droits = $_POST['id_droits'];


        $mysqli->query("INSERT INTO utilisateurs (login, password, email, id_droits) VALUES('$login', '$password', '$email', '$id_droits')")or
        die($mysqli->error);
}
