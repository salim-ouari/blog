<?php

require('header.php');

session_start();

$id = 0;
$update = false;
$id = '';
$nom = '';

$mysqli = new mysqli('localhost', 'root', '', 'blog') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $id = $_POST['id'];





    $mysqli->query("INSERT INTO categories (nom) VALUES('$nom')") or
        die($mysqli->error);

    $_SESSION['message'] = "Le compte est enregistré";
    $_SESSION['msg_type'] = "success";

    header("location: categorie.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM categories WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Le compte est bel et bien supprimé";
    $_SESSION['msg_type'] = "danger";

    header("location: categorie.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM categories WHERE id=$id") or die(mysqli_error($mysqli));

    $row = $result->fetch_array();
    $nom = $row['nom'];
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];


    $mysqli->query("UPDATE categories  SET nom='$nom', id='$id' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Les infos sont belles est bien modifiées";
    $_SESSION['msg_type'] = "warning";

    header('location: categorie.php');
}
