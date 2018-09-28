<?php
@session_start();
include '../checkIfLogin.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/konretnaKategoria.css" media="all"/>
    <meta charset="utf-8">
    <title></title>
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

      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

      <script>
      function openNav() {
      	document.getElementById("mySidenav").style.width = "250px";
          }

      function closeNav() {
   		document.getElementById("mySidenav").style.width = "0";
          }
      </script>
  <div class="d-flex justify-content-center ">
    <div class="col-8 margines">
      <h2>Pytania</h2>
      <ul>
        <script>
        function updateQuestion(){
          $(".func").click(function(){
              var content = $(this).parent('li').text();
              var values = $(this).attr('name');
              var row = content.split(".");
              var number_of_question = row[0];
              console.log(number_of_question);
              $.ajax({
                  url: "update_delete_question.php",
                  type: "POST",
                  data: {action: values, number: number_of_question},
                  success: function (data) {
                    $('#question').html(data);
                    $('#dataModal').modal("show");
                      },
                      error: function (jqXHR, textStatus, errorThrown) {
                      alert('nie dziala 1');
                      console.log(textStatus, errorThrown);
                  }
                });
                });
              }
          var category = '<?php
          @session_start();
          if(isset($_POST['category'])){
          echo $_POST['category'];
        }
        else {
          echo $_SESSION['category'];
        }
          ?>';
          function getQuestion(){
                $.ajax({
                    url: 'specificCategory.php',
                    type: "POST",
                    data: {category: category},
                    success: function (response) {
                        $('ul').append(response);
                        updateQuestion();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('nie dziala');
                        console.log(textStatus, errorThrown);
                    }
                });
            }
              $(document).ready(function () {
                getQuestion();
              });
        </script>
      </ul>
       <form method="post" action="update_question.php">
        <div id="dataModal" class="modal fade">
         <div class="modal-dialog">
              <div class="modal-content">
                   <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <div class="modal-body" id="question">
                   </div>
                   <div class="modal-footer">
                        <input type="submit" name="submit" class="edit_data" class="btn btn-default">Edit</button>
                   </div>
              </div>
         </div>
        </div>
         </form>
      	  <form action="addQuestions.php" method="post" enctype="multipart/form-data">
        	<div class="form-group">
          		<label for="exampleFormControlFile1">Dodaj pytania</label>
          		<input type="file" class="form-control-file" id="exampleFormControlFile1" name="csvFile">
          		<input type="submit" name="submit" />
        	</div>
     	 </form>
    	</div>
  	</div>
   </div>
  </body>
</html>
