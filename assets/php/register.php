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
$tutoria = $_POST['tutoria'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$password = $_POST['password'];

$db = new Database('localhost', 'root', '', 'Tutorias');

$sql = "INSERT INTO Usuario (numero_boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, preferencia_tutor, tutoria, email, password) VALUES ('$boleta', '$name', '$lastName', '$secondLastName', '$telefono', '$semestre', '$carrera', '$sexo','$tutoria', '$email', '$password')";

$response = array();

if ($db->makeQuery($sql)) {
    $response['success'] = true;
    $response['message'] = "\nBoleta: $boleta\nNombre: $name\nApellido Paterno: $lastName\nApellido Materno: $secondLastName\nTelefono: $telefono\nSemestre: $semestre\nCarrera: $carrera\nPreferencia: $sexo\nEmail: $email";
} else {
    $response['success'] = false;
    
    $error_message = $db->getErrorMessage();
    
    if (strpos($error_message, 'Duplicate entry') !== false) {
        $response['message'] = 'Ya existe un usuario con la misma boleta o correo electrónico.';
    } else {
        $response['message'] = 'Error al insertar: ' . $error_message;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
