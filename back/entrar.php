<?php
require_once('connect.php');

if (!isset($conn) || !is_object($conn)):
	exit('Erro na conexão com o banco de dados.');
endif;

if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) && !empty($_POST['password'])):

    $user = $_POST['user'];
    $password = md5($_POST['password']);

    $check_user = $conn->prepare('SELECT * FROM users WHERE user = :user OR email = :user LIMIT 1');
    $consult = $check_user->execute(['user' => $user]);

    if(!$consult):
        $erro = $check_user->errorInfo();
        exit($erro[2]);
    endif;

    $getUser = $check_user->fetch();

    if($password === $getUser['password']):
        $_SESSION['auth']       = true;
        $_SESSION['user_name']  = $getUser['name'];
        $_SESSION['user_email'] = $getUser['email'];
        $_SESSION['user_user']  = $getUser['user'];
        $_SESSION['user_id']    = $getUser['id'];
        echo json_encode(['success' => 1]);  
    else:
        $_SESSION['auth']       = false;
        echo json_encode(['success' => 0, 'msg' => 'Dados incorretos']);
    endif;

endif;
