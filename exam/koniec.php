<?php
@session_start();
include '../checkIfLoginUser.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:900,300,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/koniec.css">
    <title>Egzamin zakończony</title>
  </head>
  <body>
    <script>
        $(document).ready(function () {
                $.ajax({
                    url: "end.php",
                }).done(function (response) {
                    $('.containers').append(response);
                }).fail(function () {
                    alert("zle2");
                });
            });
    </script>
    <div class="containers">
        <div class="logo">
          <img src="../images/uniwersytet-zielonogorski.png" alt="">
          </div>
   </div>
  </body>
</html>
