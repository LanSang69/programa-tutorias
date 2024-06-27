<?php
session_start();
include '../conection.php';

$db = new Database('localhost', 'root', '', 'Tutorias');

if(isset($_POST['searchData'])) {
    $searchData = $_POST['searchData'];
    $boleta = $_SESSION['alumno_id'];

    $preferences = "SELECT preferencia_tutor FROM Usuario WHERE numero_boleta = '$boleta'";
    $result = $db->makeQuery($preferences);
    $row = $result->fetch_assoc();
    $genero = $row['preferencia_tutor'];

    $sql = "SELECT id, CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre, cupos 
            FROM Tutor 
            WHERE (nombre LIKE '%$searchData%' 
            OR apellido_paterno LIKE '%$searchData%' 
            OR apellido_materno LIKE '%$searchData%') 
            AND genero = '$genero' AND cupos < 10";

    $result = $db->makeQuery($sql);

    $response = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $response[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'cupo' => $row['cupos']
            );
        }
    }

    echo json_encode(array('success' => true, 'tutores' => $response));

} else {
    echo json_encode(array('success' => false, 'message' => 'Search data not provided.'));
}
?>