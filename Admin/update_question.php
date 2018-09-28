<?php
  @session_start();
  include '../checkIfLogin.php';

  require_once '../dbConnection.php';
  $id_question = $_SESSION['$id_question'];
  $sql_to_id_anserws = "SELECT answer_id FROM answers, question, question_to_answer_rel where  question_id = question_question_id and answer_id = answers_answer_id and question_id =".$id_question;
  $sql_to_question = 'Update question set content ="' .$_POST['text0']. '" where question_id='.$id_question;
  if(isset($_POST['submit'])) {
    $conn->query($sql_to_question);
    if($result = $conn->query($sql_to_id_anserws)){
      $k=1;
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
      $sql_to_answers = 'Update answers set content = "' .$_POST['text'.$k]. '", correct = "' .$_POST['correct'.$k]. '"  where answer_id = '.$row[0];
        $conn->query($sql_to_answers);
        $k++;
      }
      header('Location: konkretnaKategoria.php');
    }
  }
?>
