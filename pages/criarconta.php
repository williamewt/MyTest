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
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default content">
                        <div class="panel-heading">
                            <span class="pull-left">Criar conta </span>
                            <a class="pull-right" href="../">Voltar</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form action="" method="post" id="formCreateAccount">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group" id="form-name">
                                                <label class="control-label" id="label-name" for="input-name">Nome completo*</label>
                                                <input type="text" class="form-control" name="input-name" id="input-name" placeholder="Nome completo aqui" required>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group" id="form-email">
                                                <label class="control-label" id="label-email" for="input-email">E-mail*</label>
                                                <input type="email" class="form-control" name="input-email" id="input-email" placeholder="Email aqui" required>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" id="form-user">
                                                <label class="control-label" id="label-user" for="input-user">Usuário*</label>
                                                <input type="text" class="form-control" name="input-user" id="input-user" placeholder="Usuário aqui" required>
                                            </div>
                                        </div>
                                    </div>                                                                      
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group" id="form-password" data-toggle="tooltip" data-placement="top" title="A senha deve conter 6 caracteres e pelo menos uma letra maiúscula, uma minúscula e um número.">
                                                <label class="control-label" id="label-password" for="input-password">Senha*</label>
                                                <input type="password" class="form-control" name="input-password" id="input-password" placeholder="Senha aqui" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" id="form-password-confirm">
                                                <label class="control-label" id="label-password-confirm" for="input-password-confirm">Confirme a Senha*</label>
                                                <input type="password" class="form-control" name="input-password-confirm" id="input-password-confirm" placeholder="Redigite a senha aqui" required>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6 mrg-t-lg">
                                        </div>
                                        <div class="col-sm-6 mrg-t-lg">
                                            <button type="submit" id="btnSubmit" class="btn btn-lg btn-block btn-primary" data-loading-text="Criando..." disabled>Criar</button>
                                        </div>
                                    </div>                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/dist/criarconta.min.js"></script>
    </body>
</html>