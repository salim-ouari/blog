<?php

$id = 0;
$update = false;
$article = '';
$id_utilisateur = '';
$id_categorie = '';
$date = '';
require('connect.php');

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $article = $_POST['article'];
    $id_utilisateur = $_POST['id_utilisateur'];
    $id_categorie = $_POST['id_categorie'];
    $date = $_POST['date'];
    $mysqli = new mysqli('localhost', 'salim-ouari3', 'Zidane07@', 'salim-ouari_blog');
    $mysqli->query("INSERT INTO articles (id, article, id_utilisateur, id_categorie, date) VALUES('$id', '$article', '$id_utilisateur', '$id_categorie', '$date')") or die($mysqli->error);;

    $_SESSION['message'] = "L'article est enregistré";
    $_SESSION['msg_type'] = "success";

    header("location: editarticle.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli = new mysqli('localhost', 'salim-ouari3', 'Zidane07@', 'salim-ouari_blog');
    $mysqli->query("DELETE FROM articles WHERE id=$id") or die($mysqli->error);


    $_SESSION['message'] = "Le compte est bel et bien supprimé";
    $_SESSION['msg_type'] = "danger";

    header("location: editarticle.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $mysqli = new mysqli('localhost', 'salim-ouari3', 'Zidane07@', 'salim-ouari_blog');
    $update = true;
    $result = $mysqli->query("SELECT * FROM articles WHERE id=$id") or die($mysqli->error);
    $row = $result->fetch_array();
    $id = $row['id'];
    $article = $row['article'];
    $id_utilisateur = $row['id_utilisateur'];
    $id_categorie = $row['id_categorie'];
    $date = $row['date'];
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $article = $_POST['article'];
    $id_utilisateur = $_POST['id_utilisateur'];
    $id_categorie = $_POST['id_categorie'];
    $date = $_POST['date'];
    $mysqli = new mysqli("localhost", "root", "", "blog");
    $mysqli->query("UPDATE articles SET article='$article', id_utilisateur='$id_utilisateur', id_categorie= '$id_categorie', date='$date' WHERE id='$id'") or die($mysqli->error);


    $_SESSION['message'] = "Les infos sont belles est bien modifiées";
    $_SESSION['msg_type'] = "warning";

    header('location: editarticle.php');
}
