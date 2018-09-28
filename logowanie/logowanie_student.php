<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/logowanieStudenta.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400|700" rel="stylesheet">
    <title>Logowanie | Student</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="logo">
            <img src="../images/uniwersytet-zielonogorski.png" alt="">
        </div>
        <div class="header">
            <h1>Logowanie</h1>
        </div>
    </div>
    <form class="form" action="loginStudent.php" method="post">
        <input class="login" type="text" name="index" value="" placeholder="Nr indeksu" required autocomplete="off" pattern="[0-9]{5}" title="Wpisz poprawny nr. indeksu"><br>
        <input class="password" type="password" name="token" value="" placeholder="Token" required autocomplete="off"><br>
        <?php
        @session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
        <input class="submit" type="submit" value="Zaloguj">
    </form>
</div>
</body>
</html>
