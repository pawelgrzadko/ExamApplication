<?php
@session_start();
include '../checkIfLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/konretnaKategoria.css"
          media="all">
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
</div>

<span style="font-size: 30px; cursor: pointer" onclick="openNav()">&#9776;
			Menu</span>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
<div class="d-flex justify-content-center ">

    <div class="col-5 margines">
        <h2>KATEGORIE</h2>
        <div class="form-group col-md-4">
            <form method="post" action="konkretnaKategoria.php">
                <select id="inputState" class="form-control" name="category">
                  <script src="../js/apiToOptionCategory.js"></script>
                </select>
                <button type="submit" class="btn btn-primary">Wybierz kategorie</button>
            </form>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModalCenter">Dodaj kategorie
            </button>
            <!-- Modal -->
            <form method="post" action="addCategory.php">
                <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Kategoria</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nameOfCategory">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
