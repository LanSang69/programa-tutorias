<?php
session_start();
include '../conection.php';

$db = new Database('localhost', 'root', '', 'Tutorias');

$preferences = "SELECT * FROM Usuario WHERE numero_boleta = '$boleta'";
$result = $db->makeQuery($preferences);
$row = $result->fetch_assoc();

$response = array();

if ($result->num_rows > 0) {
    $response = array(
        'numero_boleta' => $row['numero_boleta'],
        'nombre' => $row['nombre'],
        'apellido_paterno' => $row['apellido_paterno'],
        'apellido_materno' => $row['apellido_materno'],
        'telefono' => $row['telefono'],
        'semestre' => $row['semestre'],
        'carrera' => $row['carrera'],
        'preferencia_tutor' => $row['preferencia_tutor'],
        'email' => $row['email'],
        'password' => $row['password'],
        'tutoria' => $row['tutoria'],
        'tutor_id' => $row['tutor_id']
    );
}

echo json_encode(array('success' => true, 'usuario' => $response));
?>