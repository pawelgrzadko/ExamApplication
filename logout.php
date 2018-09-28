<?php
session_start();

session_unset();

header('Location: ../logowanie/logowanie_prowadzacy.php');

?>
