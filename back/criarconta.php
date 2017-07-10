<?php
require_once('helpers.php');
require_once('connect.php');

require '../vendor/autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun(MAILGUN_KEY);
$domain = MAILGUN_DOMAIN;


$table            = 'users';

$name             = $_POST['input-name'];
$email            = $_POST['input-email'];
$user             = $_POST['input-user'];
$password         = $_POST['input-password'];
$password_confirm = $_POST['input-password-confirm'];

if (!isset($conn) || !is_object($conn)):
	exit('Erro na conexão com o banco de dados.');
endif;


foreach($_POST as $post):
    if(empty($post)):
        echo json_encode(['success' => 0, 'msg' => 'Os campos marcados com (*) são de preenchimento obrigatório.']);
        return false;
    endif;
endforeach;

if(!validateEmail($email)):
   echo json_encode(['success' => 0, 'msg' => 'E-mail inválido']);
   return false;
endif;

$validateEmailUnique = $conn->prepare('SELECT * FROM '.$table.' WHERE email=:email');
$validateEmailUnique->execute(['email' => $email]);

if(count($validateEmailUnique->fetchAll())):
   echo json_encode(['success' => 0, 'msg' => 'E-mail já cadastrado']);
   return false;
endif;

$validateUserUnique = $conn->prepare('SELECT * FROM '.$table.' WHERE user=:user');
$validateUserUnique->execute(['user' => $user]);

if(count($validateUserUnique->fetchAll())):
   echo json_encode(['success' => 0, 'msg' => 'Usuário indisponível']);
   return false;
endif;


if($password != $password_confirm):
    echo json_encode(['success' => 0, 'msg' => 'Senhas não conferem']);
    return false;
endif;

$sql = "INSERT INTO ".$table." (name, email, user, token, password, status) VALUES (:name, :email, :user, :token, :password, :status)"; 

$save = $conn->prepare($sql);
$save->execute([
    'name'     => $name,
    'email'    => $email,
    'user'     => $user,
    'token'    => md5(uniqid(rand(), true)),
    'password' => md5($password),
    'status'   => 0,
]);

$newId = $conn->lastInsertId();

$getRegister = $conn->prepare('SELECT * FROM '.$table.' WHERE id=:id');
$getRegister->execute(['id' => $newId]);

$register = $getRegister->fetch();   

$send = $mgClient->sendMessage($domain, array(
    'from'    => 'MyTest <contato@mytest.com.br>',
    'to'      => $register['email'],
    'subject' => 'Ativação de conta | MyTest',
    'html'    => 
    '<html>
        <h2>Olá, '.$register['name'].', acesse o link abaixo para ativar sua conta no MyTest</h2>
        <a href="'.APP_URL.'/ativacao?t='.$register['token'].'" target="_blank"> Clique aqui</a>
        <p>Ou copie o link '.APP_URL.'/ativacao?t='.$register['token'].' e cole no seu navegador</p>
    </html>'
));

echo json_encode(['success' => 1, 'msg' => 'A sua conta foi criada com sucesso! Um link de ativação foi enviado ao e-mail '.$register['email']]);

$conn = null;
