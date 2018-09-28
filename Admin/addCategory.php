<?php
@session_start();

require_once '../dbConnection.php';
$nameOfCategory = $_POST['nameOfCategory'];
$sql = "INSERT INTO category (category_id,category_name,active) Values (NULL,'$nameOfCategory', 1)";

try {
    if ($conn->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {

        if ($conn->query($sql)) {
            header('Location: kategorie');
        }
    }
} catch (Exception $e) {
    echo "blad polaczenia z baza";
}

?>