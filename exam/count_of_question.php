<?php
@session_start();
require_once '../dbConnection.php';
include '../checkIfLoginUser.php';

$token = $_SESSION['token'];
$id = $_SESSION['id_question'];
$count = count($_SESSION['question']);

$return_arr = array('idQuestion'=>$id, 'countsOfQuestion'=>$count);
echo json_encode($return_arr);
?>