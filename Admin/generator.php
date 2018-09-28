<?php
@session_start();
require '../checkIfLogin.php';
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
          crossorigin="anonymous">
    <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/token.css" media="all">

    <title>Generowanie tokenów</title>
</head>
<body>
<div class="container-fluid">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <img class="img img-fluid" src="../img/logo-uz-footer-pl2.png">
        <a href="generator" class="overlay"><img class="icon" src="../img/icons/token.svg">Generator</a>
        <a href="kategorie" class="overlay"><img class="icon" src="../img/icons/folder.svg">Kategoria</a>
        <a href="wyniki" class="overlay"><img class="icon" src="../img/icons/icon.svg">Wyniki</a>
        <a href="../logout" class="overlay"><img class="icon" src="../img/icons/exit-arrow.svg">Wyloguj</a>
    </div>
</div>
<span style="font-size: 30px; cursor: pointer" onclick="openNav()">&#9776;Menu</span>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<div class="d-flex justify-content-center full">

    <div class="col-5 margines">
        <h2>GENERUJ TOKENY</h2>
            <div class="form-group">
                <input class="form-control" placeholder="Liczba tokenów"
                       name="countTokens" id="count">
                <input class="form-control" placeholder="Liczba pytań"
                       name="countQuestion" id="countQuestion">
                <select id="inputStateScore" class="form-control" name="score">
                    <script src="../js/apiToOptionMethodScoring.js"></script>
                </select>
                <select id="inputState" class="form-control" name="category">
                  <script src="../js/apiToOptionCategory.js"></script>
                </select>
                <button onclick="onClickHadler(document.getElementById('count').value)"
                        type="submit" class="btn btn-primary" id="button">Generuj
                </button>
                <?php
                @session_start();
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                <script type="text/javascript">
                    function onClickHadler(num) {
                        alert("Wygenerowano : " + num + " tokenów.");
                    }
                </script>
            </div>

        <div class="pdf">
            <form method="post" action="createPDF.php">
                <p>Pobierz w PDF</p>
                <input type="image" name="create_pdf" class="pdf-icon"
                       src="../img/icons/pdf.svg">
            </form>
            <ul>
                <script>
                    $(document).ready(function () {
                      $("#button").click(function () {
                        var count = $('#count').val();
                        var category = $('#inputState').val();
                        var countQuestion = $('#countQuestion').val();
                          var method = $('#inputStateScore').val();
                        $.ajax({
                            url: 'generatePassword.php',
                            type: "POST",
                            data: {countTokens: count, category: category, countQuestion: countQuestion, score: method},
                            success: function (response) {
                                $('ul').append(response);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                alert('nie dziala');
                                console.log(textStatus, errorThrown);
                            }
                        });
                      })
                    });
                </script>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
