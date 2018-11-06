<?php
session_start();
require 'config.php';

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $senha = addslashes($_POST['senha']);

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome = ? AND senha = ? AND tipo = 1");
    $sql->bindValue(1, $nome);
    $sql->bindValue(2, MD5($senha));
    $sql->execute();

    if($sql->rowCount() > 0) {
        $sql = $sql->fetch();

        $_SESSION['user'] = $sql['nome'];
        header("Location: index.php");
        exit;
    }else{
        ?>
        <script>
            alert('Usuario não encontrado ou não é permitido entrar nesta área');
        </script>
        <?php
    }


}
?>
<!DOCTYPE html>
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
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <title>Login - Suporte</title>

</head>
<body class="login-page">
<div class="page-header header-filter" style="background-image: url('assets/img/bg2.jpeg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-signup">
                    <form class="form" method="POST">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title">Suporte UFGDWiki</h4>
                        </div>
                        <div class="card-body">
                            <br/>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Usuario UFGDWiki" name="nome">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" class="form-control" placeholder="Senha UFGDWiki" name="senha">
                            </div>
                            <br/>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success btn-round" value="entrar"/>
                        </div>
                        <br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
</footer>
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