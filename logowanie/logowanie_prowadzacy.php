<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/logowanie-prod.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400|700" rel="stylesheet">
    <title>Logowanie | Prowadzący</title>
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
    <form class="form" action="loginAdmin.php" method="post">
        <input class="login" type="text" name="login"  placeholder="Login" required><br>
        <input class="password" type="password" name="password" placeholder="Hasło" required><br>
        <input class="submit" type="submit" value="Zaloguj">
        <?php
        @session_start();
        if(isset($_SESSION['errorPass'])){
            echo $_SESSION['errorPass'];
            unset($_SESSION['errorPass']);
        }
        ?>
    </form>
</div>
</body>
</html>
