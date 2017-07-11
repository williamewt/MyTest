<?php
require_once('connect.php');

$field      = $_POST['field'];
$fieldValue = $_POST['fieldValue'];
$table = 'users';


$validate = $conn->prepare('SELECT * FROM '.$table.' WHERE '.$field.' = :field');
$validate->execute(['field' => $fieldValue]);

$result = $validate->fetchAll();

if(count($result)):
    echo json_encode(['validate' => 0]);
else:
    echo json_encode(['validate' => 1]);
endif;