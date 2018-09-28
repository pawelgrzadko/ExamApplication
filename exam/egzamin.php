<?php
@session_start();
include '../checkIfLoginUser.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300|700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/egzamin.css" media="all">
    <title>Egzamin</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../images/uniwersytet-zielonogorski.png" alt="">
        <div class="clock">
            <img src="../images/clock.svg" alt="">
            <div id="timer">
            </div>
        </div>
    </div>
    <input id="end-exam" class="submit end-button" type="submit" value="Zakończ egzamin">
    <script src="../js/apiToEndExam.js"></script>
        <div id="whole">
        </div>
        <script>
            $.ajax({
                url: "question_and_answers.php",
            }).done(function (response) {
                $('#whole').html(response);
            }).fail(function () {
                alert("zle52");
            });
            var count = sessionStorage.getItem('timer_station');
            var counter = setInterval(timer, 1000);
            if (count == undefined) {
                count = 1200;
            }
            function timer() {
                    count--;
                    console.log(count);
                    sessionStorage.setItem('timer_station', count);
                    if (count == 0) {
                        clearInterval(counter);
                        sessionStorage.clear();
                    }
                    let seconds = count % 60;
                    let minutes = Math.floor(count / 60);
                    let hours = Math.floor(minutes / 60);
                    minutes %= 60;
                    hours %= 60;

                    sessionStorage.setItem("secondss", seconds);
                    sessionStorage.setItem("minutess", minutes);
                    sessionStorage.setItem("hourss", hours);
                    document.getElementById("timer").innerHTML = leadingZero(sessionStorage.getItem("hourss")) + " : " + leadingZero(sessionStorage.getItem("minutess")) + " : " + leadingZero(sessionStorage.getItem("secondss"));
                }
            function leadingZero(n) {
                return n < 10 ? "0" + n : n;
            }
        </script>
        <script src="../js/apiToExam.js"></script>
        <script>

        </script>
        <div class="buttons">
            <input id="poprzednie" name="action" class="submit actions" type="submit" value="poprzednie">
            <input id="nastepne" name="action" class="submit actions" type="submit" value="nastepne">
        </div>
    <div class="dotsAll">
        <script>
        $.ajax({
        url: "count_of_question.php",
        }).done(function (response) {
        var obj = JSON.parse(response);
        var count_of_question = obj.countsOfQuestion;

        for (i = 1; i < count_of_question; i++) {
            $('.dotsAll').append('<span id="dot-' + i + '" class="dots"></span>');
        }

        }).fail(function () {
        alert("zle52");
        });
        </script>
    </div>
</body>
</html>
