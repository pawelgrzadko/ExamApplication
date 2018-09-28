$(document).ready(function () {
  $.ajax({
      url: 'optionCategory.php',
      success: function (response) {
          $('#inputState').append(response);
      },
      error: function (jqXHR, textStatus, errorThrown) {
          alert('nie dziala');
          console.log(textStatus, errorThrown);
      }
  });
});
