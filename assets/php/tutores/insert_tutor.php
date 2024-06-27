<?php
session_start();
include '../conection.php';

$tutor = $_POST['tutor_id'];
$boleta = $_SESSION['alumno_id'];

$db = new Database('localhost', 'root', '', 'Tutorias');

// Validate input data
if (empty($tutor) || empty($boleta)) {
    $response['success'] = false;
    $response['message'] = 'Invalid input data';
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Update tutor's available slots
$sql = "SELECT cupos FROM Tutor WHERE id = '$tutor'";
$result = $db->makeQuery($sql);
if (!$result) {
    $response['success'] = false;
    $response['message'] = 'Error fetching tutor data: '. $db->getErrorMessage();
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$row = $result->fetch_assoc();
$tutorCount = $row['cupos'];
if ($tutorCount <= 0) {
    $response['success'] = false;
    $response['message'] = 'Tutor has no available slots';
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$tutorCount++;
$sql = "UPDATE Tutor SET cupos = '$tutorCount' WHERE id = '$tutor'";
if (!$db->makeQuery($sql)) {
    $response['success'] = false;
    $response['message'] = 'Error updating tutor data: '. $db->getErrorMessage();
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Update student's tutor assignment
$sql = "UPDATE Usuario SET tutor_id = '$tutor' WHERE numero_boleta = '$boleta'";
if ($db->makeQuery($sql)) {
    $response['success'] = true;
    $response['message'] = "Tutor asignado correctamente.";
} else {
    $response['success'] = false;
    $error_message = $db->getErrorMessage();
    if (strpos($error_message, 'Duplicate entry')!== false) {
        $response['message'] = 'Ya tienes un tutor asignado.';
    } else {
        $response['message'] = 'Error al insertar: '. $error_message;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>