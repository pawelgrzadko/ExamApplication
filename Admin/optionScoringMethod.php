<?php
@session_start();
include '../checkIfLogin.php';
require_once '../dbConnection.php';
$sql = "SELECT content FROM scoring_method;";
try {
    if ($conn->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        if ($result = $conn->query($sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    echo '<option>' . $row[0] . '</option>';
                }
            }
        }
    }
} catch (Exception $e) {
    echo "blad polaczenia z baza";
}
?>
