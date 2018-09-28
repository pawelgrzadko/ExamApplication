<?php
@session_start();
  include '../checkIfLogin.php';
    $listOfToken = @$_SESSION['array_token'];
    $n = @count($listOfToken);
    for ($j = 0; $j < $n; $j++) {
        echo '<li>' . $j . "." . $listOfToken[$j] . '</li> <br />';
    }
?>
