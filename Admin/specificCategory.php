<?php
@session_start();
require_once '../dbConnection.php';
include '../checkIfLogin.php';

if(isset($_POST['category'])){
  $category = $_POST['category'];
  $_SESSION['category'] = $category;
}

else if(isset($category)){
    $category = $_SESSION['category'];
}

$GLOBALS['category'] = $category;
$query = "SELECT category_id FROM category where category_name = "."'$category'";
try{
    if($conn->connect_errno!=0){
throw new Exception(mysqli_connect_errno());
    }
    else{
if($idResult = $conn->query($query)){
    while ($row = mysqli_fetch_array($idResult, MYSQLI_NUM)) {
    $idCategory = $row[0];
    }
}
else{
    echo "nie wchodzi";
}
    }
    if(isset($idCategory)){
      $_SESSION['idCategory'] = $idCategory;
    }
    $sql ="SELECT question_id,content FROM question left join category_question_rel on question.question_id = category_question_rel.question_question_id where active = 1 and category_category_id = '$idCategory'";
    if($result = $conn->query($sql)){
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    if(mysqli_num_rows($result)>0){
    echo "<li>$row[0].$row[1]<input type='image' name='delete' class='icon func' src='../img/icons/trash.svg'> <input type='image' name='update' class='icon func' src='../img/icons/edit.svg'></li>";
  }

    else{
echo "Dodaj pytania!";
    }
}
      }
}

catch(Exception $e){
    echo "blad polaczenia z baza";
}
?>
