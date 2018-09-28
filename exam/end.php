<?php
@session_start();
include '../checkIfLoginUser.php';

$pkt = $_SESSION['pkt'];
$nrIndexu = $_SESSION['index'];
$ocena;
$colorOfNumber;
if($pkt<10){
  $ocena = 2;
}
else if($pkt>=10 && $pkt<14){
  $ocena = 3;
}
else if($pkt>=14 && $pkt<17){
  $ocena = 4;
}
else if($pkt>=17){
  $ocena = 5;
}

if($ocena<3){
  $colorOfNumber = 'ungrade';
}
else{
  $colorOfNumber = 'grade';
}
echo "<h1>Egzamin zakończony</h1>
        <h2>Nr indeksu</h2>
          <h3>$nrIndexu</h3>
        <h2>Wynik</h2>
          <h3>$pkt punktów</h3>
        <h2>Ocena</h2>
          <h3 class='$colorOfNumber'>$ocena</h3>";

session_unset();
session_destroy();
 ?>
