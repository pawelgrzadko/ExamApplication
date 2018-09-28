<?php
@session_start();
include '../checkIfLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
            integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/wyniki.css">
    <title></title>
</head>
<body>
<div class="container-fluid">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <img class="img img-fluid" src="../img/logo-uz-footer-pl2.png">
        <a href="generator.php" class="overlay"><img class="icon" src="../img/icons/token.svg">Generator</a>
        <a href="kategorie.php" class="overlay"><img class="icon" src="../img/icons/folder.svg">Kategoria</a>
        <a href="wyniki.php" class="overlay"><img class="icon" src="../img/icons/icon.svg">Wyniki</a>
        <a href="../logout.php" class="overlay"><img class="icon" src="../img/icons/exit-arrow.svg">Wyloguj</a>
    </div>
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
        <h2>WYNIKI</h2>
        <div class="wyniki">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Token</th>
                        <th>Nr indeksu</th>
                        <th>Punkty</th>
                        <th>Ocena</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>

                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>

                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>
                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>
                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>
                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>
                    <tr>
                        <th>1.</th>
                        <th>fasf356</th>
                        <th>12345</th>
                        <th>12</th>
                        <th>5</th>
                        <th>
                            <button type="submit" class="btn btn-primary">Generuj</button>
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p>Pobierz w PDF</p>
            <img class="pdf-icon" src="img/icons/pdf.svg">
        </div>
    </div>
</div>
</body>
</html>
