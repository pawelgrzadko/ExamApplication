$(document).ready(function () {
  $.ajax({
      url: 'optionScoringMethod.php',
      success: function (response) {
          $('#inputStateScore').append(response);
      },
      error: function (jqXHR, textStatus, errorThrown) {
          alert('nie dziala');
          console.log(textStatus, errorThrown);
      }
  });
});
