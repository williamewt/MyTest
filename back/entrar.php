<?php
require_once('connect.php');


//Verifica se existe uma conexão com o banco de dados
if (!isset($conn) || !is_object($conn)):
	exit('Erro na conexão com o banco de dados.');
    return false;
endif;

//Verifica se os campos foram preenchidos
if(empty($_POST['input-user']) && empty($_POST['input-password'])):
    echo json_encode(['success' => 0, 'msg' => 'Preencha os campos corretamente', 'alert' => 'alert-danger']);
    return false;
endif;

$user = $_POST['input-user'];
$password = $_POST['input-password'];

//Checar usuário no banco de dados
$check_user = $conn->prepare('SELECT * FROM users WHERE user = :user OR email = :user LIMIT 1');
$check_user->execute(['user' => $user]);

//Verifica se o usuário existe
if($check_user->rowCount() == 0):
    echo json_encode(['success' => 0, 'msg' => 'E-mail / Usuário incorreto', 'alert' => 'alert-danger']);
    return false;
endif;

//Pega as informações do usuário
$getUser = $check_user->fetch();
$iduser = $getUser['id'];

//Verifica se a conta está ativada
if($getUser['status'] != 1):
    $_SESSION['auth'] = false;
    echo json_encode([
        'success' => 0, 
        'msg' => 'A sua conta ainda não foi ativada! Se não encontrou o e-mail olhe na caixa de spam ou <a href="#" onclick="sendEmailConfirm('.$iduser.');">Clique aqui</a> para receber outro link de confirmação.', 
        'alert' => 'alert-warning'
        ]);
    return false;
endif;

//Verifica se a senha está correta
if(md5($password) === $getUser['password']):
    // Inicia a sessão
    session_start();
    //Armazena os dados do usuários em sessões
    $_SESSION['auth']       = true;
    $_SESSION['user_name']  = $getUser['name'];
    $_SESSION['user_email'] = $getUser['email'];
    $_SESSION['user_user']  = $getUser['user'];
    $_SESSION['user_id']    = $iduser;
    echo json_encode(['success' => 1]);  
else:
    //Destrói
	session_destroy();
    echo json_encode(['success' => 0, 'msg' => 'Senha incorreta', 'alert' => 'alert-danger']);
    return false;
endif;


