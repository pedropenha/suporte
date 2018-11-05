<?php
session_start();
require 'config.php';

if(!isset($_SESSION['user']) && empty($_SESSION['user'])) {
    ?>
    <script>
        window.location.href="login.php";
    </script>
    <?php
}else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <link rel="ufgd icon" href="http://egressos.16mb.com/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

        <title>Administração - UFGDWiki</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="assets/css/material-kit.css" rel="stylesheet"/>

        <!--   Core JS Files   -->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/material.min.js"></script>
        <script src="assets/js/nouislider.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="assets/js/material-kit.js" type="text/javascript"></script>
    </head>
    <body style="background:rgba(255,255,255,0.7);">
    <div class="container">
        <?php $url = $_SERVER['BASE_URL'];?>
        <div class="header">
            <br/>
            <img src="assets/img/ufgd-universidade-federal-da-grande-dourados-logo-BA008DE1C7-seeklogo.com.png" style="width: 100px; height: 105px;">
            <h1 style="float: right;">Suporte - <a onclick="let r = confirm('Deseja ir para UFGDWiki'); if(r === true) window.location.href='<?php echo $url;?>/UFGDWiki';"
                style="cursor: pointer;">UFGDWiki</a></h1>

            <br/>
            <a class="btn btn-danger btn-round" onclick="let r = confirm('Deseja sair do sistema?');
if(r === true) window.location.href='sair.php';" style="float: right">
                <i class="material-icons">exit_to_app</i> Sair
            </a>
            <br/>
            <br/>
        </div>
        <hr/>
        <div>
            <a class="btn btn-info btn-round" href="contato.php" style="float: right;">
                <i class="material-icons">message</i> Escrever nova mensagem</a>
            <a class="btn btn-primary btn-round" href="create-page.php" style="float: left;">
                <i class="material-icons">create</i> Criação de página</a>
        </div>
        <br/>
        <br/>
        <h3>Mensagens</h3>
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-info">Featured</h4>
            <div class="card-body">
                <h4 class="card-title">PedroPenha - Assunto - <span class="badge badge-danger">Esperando resposta</span></h4>
                <p class="card-text">Preciso que crie um novo usuario com o nome de usuario Pedro123 e senha 1234.</p>
                <a href="#0" class="btn btn-primary" style="float: right;">Responder</a>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>
