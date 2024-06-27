<?php
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

    $response = array();
    $response['success'] = true;
    $response['message'] = "\nBoleta: $boleta\nNombre: $name\nApellido Paterno: $lastName\nApellido Materno: $secondLastName\nTelefono: $telefono\nSemestre: $semestre\nCarrera: $carrera\nPreferencia: $sexo\nEmail: $email";

header('Content-Type: application/json');
echo json_encode($response);
?>
