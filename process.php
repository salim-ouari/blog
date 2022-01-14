 <?php


    session_start();

    $id = 0;
    $update = false;
    $login = '';
    $password = '';
    $email = '';
    $id_droits = '';
    
    require('header.php');
    require('connect.php');


    if (isset($_POST['save'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $id_droits = $_POST['id_droits'];




        $mysqli->query("INSERT INTO utilisateurs (login, password, email, id_droits) VALUES('$login', '$password', '$email', '$id_droits')");

        $_SESSION['message'] = "Le compte est enregistré";
        $_SESSION['msg_type'] = "success";

        header("location: admin.php");
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM utilisateurs WHERE id=$id");

        $_SESSION['message'] = "Le compte est bel et bien supprimé";
        $_SESSION['msg_type'] = "danger";

        header("location: admin.php");
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM utilisateurs WHERE id=$id");

        $row = $result->fetch_array();
        $login = $row['login'];
        $password = $row['password'];
        $email = $row['email'];
        $id_droits = $row['id_droits'];
    }


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $id_droits = $_POST['id_droits'];

        $mysqli->query("UPDATE utilisateurs SET login='$login', password='$password', email= '$email', id_droits='$id_droits' WHERE id=$id");

        $_SESSION['message'] = "Les infos sont belles est bien modifiées";
        $_SESSION['msg_type'] = "warning";

        header('location: admin.php');
    }
