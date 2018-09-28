<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<header>
  <meta charset="utf-8">
  <title>Rejestracja</title>
</head>
<body>
  <form method="post" action=func.php>
    Podaj numer indeksu<br />
    <input type="text" name="numbe_of_index" /> <br />
    Powtórz numer indeksu </br>
    <input type="text" name="confirm_number_of_index"> <br />
    <input type="submit" value="Zarejestruj się">
  </form>


</body>
</html>
