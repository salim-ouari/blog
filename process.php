<?php

session_start();

$login = '';
$password = '';
$email = '';
$id_droits = '';

$mysqli = new mysqli('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $id_droits = $_POST['id_droits'];

    


        $mysqli->query("INSERT INTO utilisateurs (login, password, email, id_droits) VALUES('$login', '$password', '$email', '$id_droits')")or
        die($mysqli->error);

        $_SESSION['message'] = "Le compte est enregistré";
        $_SESSION['msg_type'] = "success";
         
        header("location: admin.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM utilisateurs WHERE id=$id") or die($mysqli->error());

        $_SESSION['message'] = "Compte supprimé";
        $_SESSION['msg_type'] = "danger";

        header("location: admin.php");

}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM utilisateurs WHERE id=$id") or die($mysqli->error());
    if (count($result)== 1){
        $row = $result->fetch_array();
        $login = $row['login'];
        $password = $row['password'];
        $email = $row['email'];
        $id_droits = $row['id_droits'];
    }
}
