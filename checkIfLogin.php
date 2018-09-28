<?php
if(!isset($_SESSION['admin'])){

	session_unset();

	header('Location: ../logowanie/logowanie_prowadzacy.php');
}
?>
