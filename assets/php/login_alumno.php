<?php
session_start();
include 'conection.php';

$response = array(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $db = new Database('localhost', 'root', '', 'Tutorias');

    $query = "SELECT * FROM Usuario WHERE email = '$email' AND password = '$password'";
    $rows = $db->fetchAll($query, [$email, $password]);

    if (!empty($rows)) {
        $_SESSION['alumno_id'] = $rows[0]['numero_boleta'];
        $_SESSION['alumno_email'] = $email;        
        $response['success'] = true;
        $response['message'] = 'Login Éxitoso!';
    } else {
        $response['success'] = false;
        $response['message'] = 'Usuario o contraseña incorrectos';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>