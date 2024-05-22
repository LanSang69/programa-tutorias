<?php
session_start();
include 'conection.php';

$boleta = $_POST['boleta'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$secondLastName = $_POST['secondLastName'];
$telefono = $_POST['telefono'];
$semestre = $_POST['semestre'];
$carrera = $_POST['carrera'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$password = $_POST['password'];

$db = new Database('localhost', 'root', '', 'Tutorias');

$sql = "INSERT INTO Usuario (numero_boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, preferencia_tutor, email, contrasena) VALUES ('$boleta', '$name', '$lastName', '$secondLastName', '$telefono', '$semestre', '$carrera', '$sexo', '$email', '$password')";

$response = array();

if ($db->makeQuery($sql)) {
    $response['success'] = true;
    $response['message'] = 'Registro Éxitoso!';
} else {
    $response['success'] = false;
    // Capturar el mensaje de error
    $error_message = $db->getErrorMessage();
    // Verificar el tipo de error
    if (strpos($error_message, 'Duplicate entry') !== false) {
        $response['message'] = 'Ya existe un usuario con la misma boleta o correo electrónico.';
    } else {
        $response['message'] = 'Error al insertar: ' . $error_message;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
