<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
require_once(ROOT.'/config.php');

/* Define o limite de tempo da sessão em 60 minutos */
session_cache_expire(60);

// Inicia a sessão
session_start();

if (!isset($_SESSION['auth'])):
    $_SESSION['auth'] = false;
endif;

//Tenta conectar ao banco de dados
try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    die();
}