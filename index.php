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
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">
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
        <title>Login - Suporte</title>
    </head>
    <body style="background-color: white !important;">
    <div class="container">
        <?php $url = $_SERVER['BASE_URL'];?>
        <div class="header">
            <br/>
            <img src="assets/img/ufgd-universidade-federal-da-grande-dourados-logo-BA008DE1C7-seeklogo.com.png" style="width: 100px; height: 105px;">
            <h1 style="float: right;">Suporte - <a class="link-hover" onclick="let r = confirm('Deseja ir para UFGDWiki'); if(r === true) window.location.href='<?php echo $url;?>/UFGDWiki';"
                style="cursor: pointer;">UFGDWiki</a></h1>

            <br/>
            <a class="btn btn-danger btn-round text-button" onclick="let r = confirm('Deseja sair do sistema?');
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
        <hr/>
        <h3>Mensagens</h3>
        <br/>
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-danger">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#home" data-toggle="tab">Mensagens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#history" data-toggle="tab">Respondidas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="home">
                        <?php
                        $sql = "SELECT * FROM msg WHERE respondida = 0 AND usuario = ?";
                        $sql = $pdo->prepare($sql);
                        $sql->bindValue(1, $_SESSION['user']);
                        $sql->execute();

                        if($sql->rowCount() > 0){
                            $user = $sql->fetchAll();
                            foreach ($user as $item):
                        ?>
                        <div class="card card-nav-tabs">
                            <h3 class="card-header card-header-info">Usuario - <?php echo $item['usuario'];?></h3>
                            <div class="card-body">
                                <h4 class="card-text text-justify" style="margin-left: 10%;">Assunto - <?php echo $item['assunto']; if($item['respondida'] == 0)
                                        echo "<span class=\"badge badge-danger\" style='float: right; margin-right: 10%;'>Não respondida</span>"?></h4>
                                <hr style="width: 50% !important;"/>
                                <h4 class="card-text text-justify" style="margin-left: 10%;">Mensagem: <?php echo $item['mensagem']?></h4>
                                <hr style="width: 50% !important;"/>
                                <h4 class="card-text text-justify" style="margin-left: 10%; float: left;">Recebida dia: <?php echo $item['hora']?></h4>
                                <a href="responder.php?id=<?php echo $item['id'];?>" class="btn btn-primary btn-round" style="float: right">Responder</a>
                            </div>
                        </div>
                        <hr/>
                        <?php
                    endforeach;
                    }else{
                        echo "<h2>Você ainda não possui nenhuma mensagem!</h2>";
                    }
                    ?>
                </div>
                    <div class="tab-pane" id="history">
                        <?php
                        $sql = "SELECT * FROM msg_resposta WHERE usr_remetente = ?";
                        $sql = $pdo->prepare($sql);
                        $sql->bindValue(1, $_SESSION['user']);
                        $sql->execute();

                        if($sql->rowCount() > 0) {
                            $dados = $sql->fetchAll();
                            foreach ($dados as $item):
                                ?>
                                <div class="card card-nav-tabs">
                                    <h3 class="card-header card-header-info">Remetente
                                        - <?php echo $item['usr_remetente']; ?></h3>
                                    <div class="card-body">
                                        <h4 class="card-text text-justify" style="margin-left: 10%;">Assunto
                                            - <?php echo $item['assunto']; ?>
                                            <span class="badge badge-success" style="float: right; margin-right: 10%;">Respondida</span>
                                        </h4>
                                        <hr style="width: 50% !important;"/>
                                        <h4 class="card-text text-justify" style="margin-left: 10%;">
                                            Mensagem: <?php echo $item['msg_anterior'] ?></h4>
                                        <hr style="width: 50% !important;"/>
                                        <h4 class="card-text text-justify" style="margin-left: 10%;">
                                            Resposta <?php echo $item['resposta'] ?></h4>
                                        <h4 class="card-text text-justify" style="margin-right: 10%; float: right;">Dia
                                            e hora da resposta: <?php echo $item['dia_resposta'] ?></h4>
                                        <hr style="width: 50% !important;"/>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        }else{
                            echo "<h2>Você ainda não possui nenhuma mensagem respondida!</h2>";
                        }
                         ?>
        <br/><br/>
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
    <?php
}
?>
