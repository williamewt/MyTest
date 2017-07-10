<?php
session_start();

if (!isset($_SESSION['auth']) || !$_SESSION['auth']):
	header('location: ' . dirname( $_SERVER['DOCUMENT_ROOT'] ) . '/entrar');
endif;