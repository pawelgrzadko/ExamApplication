 $.ajax({
        url: "count_of_question.php",
    }).done(function (response) {
        var obj = JSON.parse(response);
        var count_of_question = obj.countsOfQuestion;

        for (i = 1; i < count_of_question; i++) {
            $('.dots').document.write('<span id="dot-' + i + '" class="dots"></span>');
        }

    }).fail(function () {
        alert("zle52");
    });