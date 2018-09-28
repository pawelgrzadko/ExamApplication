<?php
session_start();
require_once '../dbConnection.php';

$pkt = 0;
$sql_to_correct = "SELECT correct from answers,question_to_answer_rel Where content IN ('Java')  and answer_id = answers_answer_id and question_question_id = 1";
  $sql_to_count_correct_answers = "SELECT count(correct) FROM answers,question_to_answer_rel where answer_id = answers_answer_id and question_question_id = 1 and correct = 1";
for($j=0;$j<3;$j++){
  $count_of_all_answers = 0;
//  $checked_answers = $_SESSION['checkedAnswers'.$j];
  //  $id_question = $_SESSION['question'][$j];
    if ($result = $conn->query($sql_to_count_correct_answers)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $count_of_all_answers = $row[0];
            echo $count_of_all_answers;
        }
      }
    if ($result = $conn->query($sql_to_correct)) {
        $count = 0;
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
             if($row[0] ==1){
               $count++;
             }
        }
        if($count_of_all_answers==$count){
          $pkt++;
        }
}
}
echo $pkt;
?>
