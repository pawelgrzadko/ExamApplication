<?php

@session_start();
require_once '../dbConnection.php';
include '../checkIfLoginUser.php';

$pkt = 0;

$question = $_SESSION['question'];
$exam_id = $_SESSION['exam_id'];
$user_exam_id = $_SESSION['user_exam_id'];
//---------------------------------------------------------------------------------------------------------------------------------------------------------
for($j=0;$j<count($question);$j++){
  $count_of_all_answers = 0;
  $checked_answers = $_SESSION['checkedAnswers'.$j];
  $id_question = $_SESSION['question'][$j];
  $newArray ="'".implode("', '", $checked_answers)."'";
  $sql_to_correct = "SELECT correct,answer_id from answers,question_to_answer_rel Where content IN (".$newArray.") and answer_id = answers_answer_id and question_question_id =". $id_question;
  $sql_to_count_correct_answers = "SELECT count(correct) FROM answers,question_to_answer_rel where answer_id = answers_answer_id and correct = 1 and question_question_id =". $id_question;
//---------------------------------------------------------------------------------------------------------------------------------------------------------
    if ($result = $conn->query($sql_to_count_correct_answers)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $count_of_all_answers = $row[0];
        }
      }

    if ($result = $conn->query($sql_to_correct)) {
        echo "idQuestion:".$id_question."</br>";
        echo "examId:".$user_exam_id."</br>";
      $count = 0;
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            echo "Answer:".$row[1]."</br>";
          $conn->query("INSERT INTO user_answer_rel (user_answer_rel_id, question_question_id, answers_answer_id, userExam_userExam_id) Values (NULL,'$id_question','$row[1]','$user_exam_id')");
             if($row[0] == 1){
               $count++;
             }
             else {
                 $count--;
             }
        }
        if($count_of_all_answers==$count){
          $pkt++;
        }
}
}
echo $pkt;
  $_SESSION['pkt'] = $pkt;
?>
