$(document).ready(function () {
    $("#end-exam").click(function () {
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
                url: "finishExam.php",
            }).done(function (response) {
              window.location.href="koniec";
            }).fail(function () {
                alert("zle52");
            });
        }).fail(function () {
            alert("zle2");
        });
    });
});
