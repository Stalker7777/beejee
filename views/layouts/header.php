<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
    <script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>
    <div id="page" class="row col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <div id="container" class="row col-md-12">
            <div id="header" class=" row col-md-12 text-right">
                <div class="row form-group">
                    <?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) { ?>
                        <div>Пользователь: Админ <a href="index.php?form=logout" class="btn btn-success">Выйти</a></div>
                    <?php } else { ?>
                        <div><a href="index.php?form=login" class="btn btn-success">Войти</a></div>
                    <?php } ?>
                </div>
            </div>
