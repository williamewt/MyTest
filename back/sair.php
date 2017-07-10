<?php
// Inicia a sessão
session_start();
//Destrói a sessão
unset($_SESSION);
session_destroy();

header('location: ../entrar');    