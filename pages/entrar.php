<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth']):
	header('location: /perfil');
endif;
?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MyTest</title>
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/normalize-css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default content">
                        <div class="panel-heading">
                            <span class="pull-left">Entrar </span>
                            <a class="pull-right" href="../">Voltar</a>
                            <div class="clearfix"></div>                            
                        </div>                        
                        <div class="panel-body">                            
                            <div class="form">
                                <div id="alert-div" class="alert hidden alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <span id="alert-msg"></span>
                                </div>
                                <img id="spinner" class="center-block hidden" src="img/spinner.svg" alt="">
                                <form action="" method="post" id="formLogin">
                                    <div class="form-group">
                                        <label for="input-user">E-mail / Usuário*</label>
                                        <input type="text" class="form-control" name="input-user" id="input-user" placeholder="E-mail / Usuário" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-password">Senha*</label>
                                        <input type="password" class="form-control" name="input-password" id="input-password" placeholder="Senha" required>
                                    </div>
                                    <button type="submit" id="btnDoLogin" data-loading-text="Processando..." class="btn btn-lg btn-block btn-success">Entrar</button>
                                </form>                            
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>        
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/dist/entrar.min.js"></script>
    </body>
</html>