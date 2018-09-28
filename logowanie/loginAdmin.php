<?php

@session_start();
require_once '../dbConnection.php';

$login = $_POST['login'];
$haslo = $_POST['password'];

$login = htmlentities($login, ENT_QUOTES, 'UTF-8');


if ($result = $conn->query(sprintf("Select * from admin where admin_name ='%s'", mysqli_real_escape_string($conn, $login)))) {
    $exist = $result->num_rows;
    if ($exist > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($haslo, $row['password'])) {
            $_SESSION['admin'] = $login;
            header('Location: ../Admin/generator.php');
            exit();
        }
        else {
            $_SESSION['errorPass'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: logowanie_prowadzacy.php');
            exit();
        }
    }
    else {
        $_SESSION['errorPass'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location: logowanie_prowadzacy.php');
        exit();
    }
}
?>
