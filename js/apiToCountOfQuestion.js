 $.ajax({
        url: "count_of_question.php",
    }).done(function (response) {
        var obj = JSON.parse(response);
        var count_of_question = obj.countsOfQuestion;

        for (i = 1; i < count_of_question; i++) {
            document.getElementsByClassName('dotsAll').innerHTML('<span id="dot-' + i + '" class="dots"></span>');
        }

    }).fail(function () {
        alert("zle52");
    });