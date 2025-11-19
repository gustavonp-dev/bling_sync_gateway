<?php 

require __DIR__ . '/vendor/autoload.php';

$payload = file_get_contents('php://input');
$payload = json_decode($payload, true);

echo json_encode($payload);