<?php
session_start();

$response = [];

if (!isset($_SESSION['id'])) {
    $response['status'] = 'error';
    $response['message'] = 'No puedes acceder a esta página';
} else {
    $response['status'] = 'success';
    $response['message'] = 'Bienvenido Admin';
    $response['email'] = $_SESSION['email'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
