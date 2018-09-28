<?php
@session_start();
include '../checkIfLogin.php';

if (isset($_POST["submit"])) {
    $csvName = $_FILES['csvFile']['name'];
    $folder = "../";
    if (isset($_FILES['csvFile'])) {

        if ($_FILES['csvFile']["error"] > 0) {
        }
        else {

            if (file_exists($folder . $_FILES['csvFile']["name"])) {
            }
            else {
                move_uploaded_file($_FILES['csvFile']["tmp_name"], $folder . $csvName);
            }
        }
    }
    else {
    }
}

if (! $fd = fopen('../'.$csvName, 'r')) {
} else {
    require_once '../dbConnection.php';

//---------------------------------------------------------------------------------------------------------------------------------------------------------
    while (! feof($fd)) {

        $line = fgets($fd);
        if($line == ''){
            continue;
        }

        $line_after_split = explode("|", $line);

        $sub_category =  trim($line_after_split[3]);

        // Wez kolejne wolne id pytania
        $max_question_id_query = "SELECT MAX(question_id) FROM question";
        $max_answer_id_query = "SELECT MAX(answer_id) FROM answers";
        $get_sub_category_id_query = "SELECT sub_category_id from sub_category where name ="."'$sub_category'";
        $max_question_id = get_max_free_id($max_question_id_query, $conn);

        // Tresc pytania z pliku *.csv
        $query_content = $line_after_split[0];
        // Tresc odpowiedzi z pliku *.csv zaladowana do tablicy
        $answers_array = explode("//",$line_after_split[1]);


        $correct_answers_array = explode('//', $line_after_split[3]);

        add_query_to_database($conn, $max_question_id, $query_content);

        add_question_to_category($conn, $_SESSION['idCategory'], $max_question_id);

        add_sub_category_to_database($conn, $sub_category);

        $sub_category_id = get_sub_category_id($get_sub_category_id_query, $conn);

        add_relation_question_to_sub_category_to_database($conn,$max_question_id,$sub_category_id);

        for ($i = 0; $i < count($answers_array); $i ++) {
            $answer_content = $answers_array[$i];
            $max_answer_id = get_max_free_id($max_answer_id_query, $conn);

            if (in_array($i, $correct_answers_array)) {
                add_answer_to_Database($conn, $max_answer_id, $answer_content, 1);
            }
            else {
                add_answer_to_Database($conn, $max_answer_id, $answer_content, 0);
            }
            add_relation_question_to_answer_to_database($conn, $max_question_id, $max_answer_id);
        }
    }

    header('Location: konkretnaKategoria.php');
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
function get_max_free_id($query, $connection)
{
    $id = $connection->query($query);
    $row = mysqli_fetch_row($id);
    $result_max_id = $row[0];
    if ($result_max_id == null) {
        $result_max_id = 1;
    } else {
        $result_max_id += 1;
    }
    return $result_max_id;
}

function get_sub_category_id($query, $connection)
{
    $id = $connection->query($query);

    $row = mysqli_fetch_row($id);
    $result_id = $row[0];

    return $result_id;
}


function add_query_to_database($connection, $id, $content)
{
    $connection->query("INSERT INTO question (question_id, content,active) VALUES ('$id','$content',1)");
}

function add_answer_to_database($connection, $id, $content, $is_correct)
{
   $connection->query("INSERT INTO answers (answer_id, content, correct) VALUES ('$id','$content', '$is_correct')");
}

function add_relation_question_to_answer_to_database($connection, $question_id, $answer_id)
{
    $connection->query("INSERT INTO question_to_answer_rel (question_question_id, answers_answer_id) VALUES ('$question_id', '$answer_id')");
}

function add_sub_category_to_database($connection, $content)
{
    $connection->query("INSERT INTO sub_category (sub_category_id, name) VALUES (NULL,'$content')");
}

function add_relation_question_to_sub_category_to_database($connection, $question_id, $sub_category_id)
{
    $connection->query("INSERT INTO question_sub_category_rel (question_question_id, sub_category_sub_category_id) VALUES ('$question_id','$sub_category_id')");
}

function clear_table_answer_question_relation_answer_to_question($connection)
{
    delete_from_table($connection, "question_to_answer_rel");
    delete_from_table($connection, "answers");
    delete_from_table($connection, "question");
}

function delete_from_table($connection, $table_name)
{
    $connection->query("DELETE FROM $table_name");
}

function add_question_to_category($connection, $id_category, $id_question)
{
    $connection->query("INSERT INTO category_question_rel (category_category_id, question_question_id) VALUES ('$id_category','$id_question')");
}
?>
