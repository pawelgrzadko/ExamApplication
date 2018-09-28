<?php
@session_start();
include '../checkIfLoginUser.php';

$i = $_SESSION['id_question'];

$table_of_answers = array();
$pytania = array();
$checked_answers = array();

$id_pytania = $_SESSION['id_pytania' . $i];
$question = $_SESSION['question_id_' . $i];
$answers = $_SESSION['answers_to_next_question' . $i];

$k = 0;
$j = 0;
//---------------------------------------------------------------------------------------------------------------------------------------------------------
if (sizeof($_POST['check']) == 0) {
    for ($k = 0; $k < count($answers); $k++) {
        array_push($table_of_answers, "<div class='control-group'>
            <label class='control control-check'>
            $answers[$k]
            <input type='checkbox' name='check' class='get_value' value='check$k'>
            <div class='control_indicator'></div>
            </label>
            </div>");
    }
}
while ($j < sizeof($_POST['check'])) {
    while ($k < count($answers)) {
        if ('check' . $k == $_POST['check'][$j]) {
            array_push($table_of_answers, "<div class='control-group'>
            <label class='control control-check'>
            $answers[$k]
            <input type='checkbox' name='check' class='get_value' value='check$k' checked>
            <div class='control_indicator'></div>
            </label>
            </div>");
            array_push($checked_answers, $answers[$k]);
            $k++;
            $j++;
        } else {
            array_push($table_of_answers, "<div class='control-group'>
            <label class='control control-check'>
            $answers[$k]
            <input type='checkbox' name='check' class='get_value' value='check$k'>
            <div class='control_indicator'></div>
            </label>
            </div>");
            $k++;
        }
    }
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------
array_push($pytania, "$id_pytania", "$question");
$result = array_merge($pytania, $table_of_answers);
$_SESSION['result' . $i] = $result;
$_SESSION['checkedAnswers'.$i] = $checked_answers;

if ($_POST['action'] == 'nastepne') {
    $_SESSION['id_question']++;
} else {
    $_SESSION['id_question']--;
}
/*$id = $_SESSION['id_question'];
$count = count($_SESSION['question']);
$return_arr = array('idQuestion'=>$id, 'countsOfQuestion'=>$count);
echo json_encode($return_arr);*/
?>
