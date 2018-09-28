<?php
    session_start();
    require_once 'dbConnection.php';

    if($_POST['action'] == 'poprzednie'){
        $_SESSION['id_question']--;
    }
    else if($_POST['action'] == 'nastepne'){
        $_SESSION['id_question']++;
    }

    header("Location: egzamin.php?id=".$_SESSION['id_question']);
?>