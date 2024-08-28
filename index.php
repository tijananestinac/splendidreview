<?php
    session_start();
    require "config/connection.php";
    //require "views/fixed/head.php";
    //require "views/fixed/menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Movie, Review, Critics, Splendid"/>
    <meta name="description" content="We are Splendid Review. We offer you the best reviews on hottest movies right now. Our team is made up of 4 beautful people. We have a lot in store for you."/>
    <meta name="author" content="Tijana Nestinac"/>
    <link rel="shortcut icon" href="assets/img/icon.ico"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css"/>
    <title>Movie</title>
</head>
<body>
    <div id="sajt">
        <?php require "views/indexContent.php"; ?>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"  type="text/javascript"></script>
    <script src="assets/js/main.min.js" type="text/javascript"></script>
</body>
</html>
