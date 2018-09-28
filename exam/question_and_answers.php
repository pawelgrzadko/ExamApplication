<?php
@session_start();
include '../checkIfLoginUser.php';

$i = $_SESSION['id_question'];
$number_of_question = $i + 1;

$pytania = array();
//---------------------------------------------------------------------------------------------------------------------------------------------------------
if (!isset($_SESSION['question_id_' . $_SESSION['id_question']])) {
    require_once 'exam.php';
    require_once '../dbConnection.php';
    if (!isset($arrayQuestion)) {
        $arrayQuestion = $_SESSION['question'];
    }
    $exam_id = $_SESSION['exam_id'];
    $sql_to_question_content = "Select content,question_id from question where question_id =" . $arrayQuestion[$i];
    $sql_to_answer_content = "SELECT answer_id, content FROM answers,question_to_answer_rel where answer_id = answers_answer_id and question_question_id =" . $arrayQuestion[$i];

    $question;
    $id_pytania = "<h1>Pytanie nr<span id='nrpytania' name='nrpytania'>$number_of_question</span></h1>";
    if ($result = $conn->query($sql_to_question_content)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
          $conn->query("INSERT INTO exam_to_question_rel (exam_to_question_rel_id, exam_exam_id, questions_question_id) Values (NULL,'$exam_id','$row[1]')");
            $question = "<p>$row[0]</p>";
        }
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------
    $answers = array();
    $table_of_answers = array();
    if ($result = $conn->query($sql_to_answer_content)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            array_push($answers, $row[1]);
        }
        shuffle($answers);
        for ($k = 0; $k < count($answers); $k++) {
            array_push($table_of_answers,"<div class='control-group'>
        <label class='control control-check'>
        $answers[$k]
        <input type='checkbox' name='check' class='get_value' value='check$k'>
        <div class='control_indicator'></div>
        </label>
        </div>");
        }
        $_SESSION['answers_to_next_question' . $i] = $answers;
        $_SESSION['question_id_' . $i] = $question;
        $_SESSION['id_pytania' . $i] = $id_pytania;
    }
    array_push($pytania, "$id_pytania", "$question");
    $result = array_merge($pytania,$table_of_answers);
    foreach ($result as $a){
        echo $a;
    }
    $_SESSION['result'.$i] = $result;
    unset($_POST['action']);
}
else {
    $result = $_SESSION['result'.$i];
    foreach ($result as $a) {
        echo $a;
    }
    unset($_POST['action']);
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------

?>
<script type="text/javascript">

    var id = <?php echo $_SESSION['id_question'];?>;
    var dots = <?php echo count($_SESSION['question']);?>;

    if (id == 0) {
        document.getElementById('poprzednie').setAttribute('style', 'display:none');
    }
    else {
        document.getElementById('poprzednie').setAttribute('style', 'display:inline-block');
    }
    if (id == (dots-1)) {
        document.getElementById('nastepne').setAttribute('style', 'display:none');
    }
    else {
        document.getElementById('nastepne').setAttribute('style', 'display:inline-block');
    }

    function refreshDots(que, dots) {
        for (i = 1; i <= que; i++) {
            document.getElementById("dot-" + i).style.backgroundColor = "#00778f";
        }
        for (i = que + 1; i <= dots; i++) {
            document.getElementById("dot-" + i).style.backgroundColor = "#bbb";
        }
    }

    refreshDots(id, dots);   //To je zamalowuje

    if(action=="poprzednie"){
        id--;
    }
    else {
        id++;
    }

    if (id > dots) {
        id = dots;
    }

    if (id < 1) {
        id = 1;
    }
    refreshDots(id, dots);
</script>