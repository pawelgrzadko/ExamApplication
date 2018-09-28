<?php
@session_start();
require_once '../dbConnection.php';
include '../checkIfLoginUser.php';

$token = $_SESSION['token'];
$index = $_SESSION['index'];

$sql_id_category = "Select category_category_id from token where Token ='$token'";
$sql_count_of_question = "Select count_of_question from token where Token ='$token'";
$sql_id_user = "Select user_exam_id from user_exam where user_number_of_index = '$index'";
$sql_to_user_exam_id = "SELECT user_exam_id FROM user_exam where user_number_of_index ='$index' and token ='$token'";

$user_exam_id = get_value($conn,$sql_to_user_exam_id);
$category_id = get_value($conn, $sql_id_category);
$user_id = get_value($conn, $sql_id_user);
$count_of_question = get_value($conn, $sql_count_of_question);
$date = date('Y-m-d', time());


$sql_radnom_question = "SELECT * FROM question left join category_question_rel on question.question_id = category_question_rel.question_question_id where active = 1 and category_category_id = '$category_id' ORDER BY RAND() LIMIT 1";

$_SESSION['user_exam_id'] = $user_exam_id;
$question = array();
$sql_to_exam_id = "SELECT exam_id FROM exam where user_exam_user_exam_id =".$user_exam_id;
//---------------------------------------------------------------------------------------------------------------------------------------------------------
try {
    if ($conn->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        if ($conn->query("INSERT INTO exam (exam_id,date,user_exam_user_exam_id,category_category_id) Values (NULL,'$date','$user_id','$category_id')")){
          $exam_id = get_value($conn,$sql_to_exam_id);
           $question = get_random_question($conn,$sql_radnom_question, $count_of_question);
           $_SESSION['question'] = $question;
           $_SESSION['exam_id'] = $exam_id;
           delete_token_from_database($conn, $token);
        }
    }
}
catch(Exception $e) {
    echo "blad polaczenia z baza";
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
function get_random_question($connection, $sql, $count_of_question){
    $question = array();
    try {
        if ($connection->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            while(sizeof($question) < $count_of_question) {
                if ($result = $connection->query($sql)) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        if(in_array($row[0], $question)){
                            continue;
                        }
                        else{
                            array_push($question, $row[0]);
                        }
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo "blad polaczenia z baza";
    }
    return $question;
}


function get_value($connection, $sql)
{
    $value = "";
    try {
        if ($connection->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        }
        else {
            if ($result = $connection->query($sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        $value = $row[0];
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo "blad polaczenia z baza";
    }
    return $value;
}
function delete_token_from_database($connection, $token)
{
    $connection->query("Delete from token WHERE Token ='$token'");
}
?>
