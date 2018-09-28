$(document).ready(function () {
    $(".actions").click(function () {
        var checkbox = new Array();
        $('input[name="check"]:checked').each(function () {
            checkbox.push($(this).val());
        });
        var values = $(this).val();
        $.ajax({
            url: "showQuestion.php",
            type: "POST",
            data: {action: values, check: checkbox},
        }).done(function () {
            $.ajax({
                url: "question_and_answers.php",
            }).done(function (response) {
                $('#whole').html(response);
            }).fail(function () {
                alert("zle52");
            });
        }).fail(function () {
            alert("zle2");
        });
    });
});
