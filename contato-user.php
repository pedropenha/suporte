<?php
require 'config.php';
?>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./assets/img/ufgd-universidade-federal-da-grande-dourados-logo-BA008DE1C7-seeklogo.com.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <title>Contato</title>
</head>
<body style="background-color: white !important;">
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container">
        <a class="navbar-brand" href="/suporte" style="color: white !important;">Suporte - UFGDWiki</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="float: left !important;">
            <i class="material-icons text-light">
                menu
            </i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: white; margin-left: 1600% !important;"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <br>
    <form method="POST">
        <h2>Contato <a class="btn btn-round btn-fab btn-info float-right text-light" onclick="window.location.href='http://192.168.25.82/UFGDWiki/contato'">
                <i class="material-icons">arrow_back</i></a></h2>
        <br>
        <?php
        if(isset($_POST['nome']) && !empty($_POST['email'])){

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $tipo = addslashes($_POST['tipo']);
            $assunto = addslashes($_POST['assunto']);
            $mensagem = addslashes($_POST['mensagem']);

            $sql = "INSERT INTO msg(usuario, email, tipo, assunto, mensagem, hora) VALUES (?,?,?,?,?,NOW())";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(1, $nome);
            $sql->bindValue(2, $email);
            $sql->bindValue(3, $tipo);
            $sql->bindValue(4, $assunto);
            $sql->bindValue(5, $mensagem);
            $sql->execute();

            ?>
            <script>
                alert('Mensagem enviada com sucesso');
                window.location.href='index.php';
            </script>
            <?php

        }
        ?>
        <h3>Nome:</h3>
        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Ex: Pedro Penha">
            <span class="material-input"></span>
        </div>
        <h3>Email:</h3>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Ex: exemplo@hotmail.com">
            <span class="material-input"></span>
        </div>
        <h3>Tipo de usuario</h3>
        <div class="form-group">
            <select class="custom-select" name="tipo">
                <option></option>
                <option value="Diretor">Diretor</option>
                <option value="Coordenador">Coordenador</option>
                <option value="Docente">Docente</option>
                <option value="Discente">Discente</option>
                <option value="out_user">Usuário de fora</option>
            </select>
            <span class="material-input"></span>
        </div>
        <h3>Assunto do contato:</h3>
        <div class="form-group">
            <input type="text" class="form-control" name="assunto" value="Criação de conta"/>
            <span class="material-input"></span>
        </div>
        <h3>Mensagem:</h3>
        <textarea class="form-control" name="mensagem"></textarea>

        <br/>
        <input class="btn btn-success btn-round float-right" type="submit" value="Enviar">
    </form>
</div>
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--	Plugin for Sharrre btn -->
<script src="assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        //init DateTimePickers
        materialKit.initFormExtendedDatetimepickers();

        // Sliders Init
        materialKit.initSliders();
    });


    function scrollToDownload() {
        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }


    $(document).ready(function() {

        $('#facebook').sharrre({
            share: {
                facebook: true
            },
            enableHover: false,
            enableTracking: false,
            enableCounter: false,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('facebook');
            },
            template: '<i class="fab fa-facebook-f"></i> Facebook',
            url: 'https://demos.creative-tim.com/material-kit/index.html'
        });

        $('#googlePlus').sharrre({
            share: {
                googlePlus: true
            },
            enableCounter: false,
            enableHover: false,
            enableTracking: true,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('googlePlus');
            },
            template: '<i class="fab fa-google-plus"></i> Google',
            url: 'https://demos.creative-tim.com/material-kit/index.html'
        });

        $('#twitter').sharrre({
            share: {
                twitter: true
            },
            enableHover: false,
            enableTracking: false,
            enableCounter: false,
            buttons: {
                twitter: {
                    via: 'CreativeTim'
                }
            },
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('twitter');
            },
            template: '<i class="fab fa-twitter"></i> Twitter',
            url: 'https://demos.creative-tim.com/material-kit/index.html'
        });

    });
</script>
</body>
</html>