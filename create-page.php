<?php
session_start();
require 'config.php';
require 'config2.php';

if(!isset($_SESSION['user']) && empty($_SESSION['user'])) {
    ?>
    <script>
        window.location.href="login.php";
    </script>
    <?php
}else {
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Gerenciamento de Página</title>

        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/material-kit.css" rel="stylesheet">

        <!--   Core JS Files   -->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/material.min.js"></script>
        <script src="assets/js/nouislider.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="assets/js/material-kit.js" type="text/javascript"></script>
    </head>
    <body style="background-color: transparent;">
    <div class="container">
        <br>
        <form method="POST">
            <h2>Gerenciamento de páginas
                <a href="./" class="btn btn-info btn-fab btn-fab-mini btn-round" style="float: right;"><i
                            class="material-icons">arrow_back</i></a></h2>
            <br>
            <br>
            <h4>Assunto do contato</h4>
            <div class="form-group">
                <select class="form-control">
                    <option></option>
                    <option>Criação de nova página</option>
                    <option>Deletar página</option>
                    <option>Atribuir usuario a uma página</option>
                    <option>Outros</option>
                </select>
            </div>
            <h4>Mensagem</h4>
            <textarea class="form-control"></textarea>

            <input class="btn btn-success" type="submit" value="Enviar">
        </form>
    </div>
    </body>
    </html>
    <?php
}
    ?>