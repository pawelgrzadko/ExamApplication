<?php
  @session_start();
  require_once '../dbConnection.php';
  include '../checkIfLogin.php';

  $id_question = $_POST['number'];
  $_SESSION['$id_question'] = $id_question;
  $k=1;
  $sql_to_question = "SELECT * FROM answers,question_to_answer_rel,question where answer_id = answers_answer_id and question_question_id = question_id and question_id =".$id_question;
  $sql_to_delete = "Update question set active = 0 where question_id=".$id_question;
if ($_POST['action'] == 'update') {
  if ($result = $conn->query($sql_to_question)) {

      while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        if($k==1){
          echo '<h2 name="text6">Pytanie nr '.$row[5].'</h2>';
          echo '<label for="text0">Question</label>';
          echo '<input type="text" class="form-control" name="text0" value="' .$row[6]. '">';
          echo '<label for="text1">Answers</label>';
      }
        echo '<input type="text" class="form-control" placeholder="Answers" name="'.'text'.$k.'" value="' .$row[1]. '"> <input type="text" class="form-control" placeholder="Answers" name="'.'correct'.$k.'" value="' .$row[2]. '">';
        $k++;
      }
    }

}
  else {
      $conn->query($sql_to_delete);
      echo "Usunięto pytanie nr ".$id_question;
}

 ?>
