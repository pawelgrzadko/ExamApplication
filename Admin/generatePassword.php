<?php
@session_start();
require_once '../dbConnection.php';

$countOfPassword = $_POST['countTokens'];
$category = $_POST['category'];
$countOfQuestion = $_POST['countQuestion'];
$methodScore = $_POST['score'];
//---------------------------------------------------------------------------------------------------------------------------------------------------------
$sql_category = "SELECT category_id FROM category where category_name = "."'$category'";
$sql_methodScore = "Select scoring_method_id from scoring_method where content ="."'$methodScore'";

$category_id = get_value($conn, $sql_category);
$methodScore_id = get_value($conn, $sql_methodScore);
//---------------------------------------------------------------------------------------------------------------------------------------------------------
$listOfToken = array();
for ($i = 0; $i < $countOfPassword; $i++) {
    $uniq = md5(uniqid(rand()));
    $password = substr($uniq, 0, 10);
    $sql = "INSERT INTO token (Token, count_of_question, category_category_id, scoring_method_scoring_method_id) Values ('$password','$countOfQuestion','$category_id','$methodScore_id')";
    if ($conn->query($sql) === TRUE) {
        array_unshift($listOfToken, $password);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$_SESSION['array_token'] = $listOfToken;

$n = count($listOfToken);
for ($j = 0; $j < $n; $j++) {
    echo '<li>' . $j . "." . $listOfToken[$j] . '</li> <br />';
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
?>

