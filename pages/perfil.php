<?php require('../back/checkauth.php');?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Perfil</title>        
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/normalize-css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <?php require_once('../back/helpers.php');?>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MyTest</a>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text"><?php echo $_SESSION['user_name']; ?></p></li>
                    <li><a href="../sair">Sair</a></li>                    
                </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <img class="img-circle img-thumbnail center-block" src="<?php echo get_gravatar($_SESSION['user_email'], 120) ?>" alt="">                            
                        
                        <table class="table mrg-t-lg">
                            <tr>
                                <td><strong>Nome:</strong></td>
                                <td><?php echo $_SESSION['user_name']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Usuário:</strong></td>
                                <td><?php echo $_SESSION['user_user']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>E-mail:</strong></td>
                                <td><?php echo $_SESSION['user_email']; ?></td>
                            </tr>
                        </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>