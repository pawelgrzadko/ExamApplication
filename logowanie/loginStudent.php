<?php
@session_start();
require_once '../dbConnection.php';
$login = $_POST['index'];
$token = $_POST['token'];

$_SESSION['token'] = $token;
$_SESSION['index'] = $login;

$_SESSION['id_question'] = 0;
//---------------------------------------------------------------------------------------------------------------------------------------------------------
try {
    if ($conn->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        $sql = "Select Token from token where Token = '$token'";
        if ($result = $conn->query($sql)) {
            $tokenExist = $result->num_rows;
            if ($tokenExist > 0) {
                $login = htmlentities($login, ENT_QUOTES, "UTF-8");
                check_numbers_of_index($conn, $login);
                add_user_to_database($conn, $login, $token);
                $_SESSION['user'] = $login;
                header("Location: ../exam/egzamin.php");

            } else {
                $_SESSION['error'] = '<span style="color:#ff0000">Nieprawidłowy token!</span>';
                header('Location: logowanie_student.php');
            }
        }
    }
} catch (Exception $e) {
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
function check_numbers_of_index($connection, $login)
{
    if ($resultLogin = $connection->query(sprintf("Select number_of_index from user where number_of_index ='%s'", mysqli_real_escape_string($connection, $login)))) {
        if (($resultLogin->num_rows) == 0) {
            $connection->query(sprintf("INSERT INTO user (number_of_index) Values ('%s')", mysqli_real_escape_string($connection, $login)));
        } else {
            $_SESSION['error'] = '<span style="color:#ff0000">Nieprawidłowy nr indexu!</span>';
            header('Location: logowanie_student.php');
        }
    }
}


function add_user_to_database($connection, $login_id, $token)
{
    $connection->query(sprintf("INSERT INTO user_exam (user_exam_id, user_number_of_index, token) Values (NULL,'%s','%s')", mysqli_real_escape_string($connection, $login_id), mysqli_real_escape_string($connection, $token)));
}

?>
