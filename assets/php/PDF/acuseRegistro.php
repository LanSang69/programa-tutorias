<?php
session_start();
require('fpdf.php');
include '../conection.php';

$db = new Database('localhost', 'root', '', 'Tutorias');

$boleta = $_SESSION['alumno_id'];

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

// Datos
$boleta = $row['numero_boleta'];
$nombre_completo = $row['nombre'] . " " . $row['apellido_paterno'] . " " . $row['apellido_materno'];
$telefono = $row['telefono'];
$semestre = $row['semestre'];
$carrera = $row['carrera'];
$preferencia_tutor = $row['preferencia_tutor'];

// Tutor
$tutor_id = $row['tutor_id'];
$tutor_query = "SELECT CONCAT(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre FROM Tutor WHERE id = '$tutor_id'";
$tutor_result = $db->makeQuery($tutor_query);
$tutor_row = $tutor_result->fetch_assoc();
$nombre_tutor = $tutor_row['nombre'];

$email = $row['email'];
$tutoria = $row['tutoria'];

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo IPN
        $this->Image('logoIPN.png',13,3,28);
        // Logo ESCOM
        $this->Image('logoESCOM.png',168,7,25);
        // Arial bold 18
        $this->SetFont('Arial','B',20);
        // Establecer color de texto Dark Cerulean (RGB: 25, 74, 122)
        $this->SetTextColor(25, 74, 122);
        // Movernos a la derecha
        $this->Cell(44);
        // Título
        $this->Cell(100,15, utf8_decode('Acuse de Registro a la Tutoría'),0,0,'C');
        // Salto de línea
        $this->Ln(30);
        // Restablecer color a negro
        $this->SetTextColor(0, 0, 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }

    // Tabla de información
    // Tabla de información
function Table($data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(25, 74, 122);
    $this->SetTextColor(255);
    $this->SetDrawColor(0, 0, 0);
    $this->SetLineWidth(.3);
    $this->SetFont('Arial', 'B', 12);
    
    // Anchura de las columnas
    $w = array(60, 130);
    
    // Cabecera
    $this->Cell($w[0] + $w[1], 7, utf8_decode('Información del Registro'), 1, 0, 'C', true);
    $this->Ln();
    
    // Restauración de colores y fuentes
    $this->SetFillColor(224, 235, 255);
    $this->SetTextColor(0);
    $this->SetFont('Arial', '', 12);
    
    // Datos
    $fill = false;
    foreach($data as $row)
    {
        // Verificar si la fila es para el Nombre del Tutor
        if ($row[0] == 'Nombre del Tutor') {
            // Resaltar en color negro
            $this->SetTextColor(0); // Negro
            $this->SetFont('Arial', 'B', 12); // Fuente en negrita
        } else {
            // Restaurar color y fuente normal
            $this->SetTextColor(0); // Restaurar a negro por defecto
            $this->SetFont('Arial', '', 12); // Restaurar fuente normal
        }
        
        $this->Cell($w[0], 6, utf8_decode($row[0]), 'LR', 0, 'L', $fill);
        $this->Cell($w[1], 6, utf8_decode($row[1]), 'LR', 0, 'L', $fill);
        $this->Ln();
        $fill = !$fill;
    }
    
    // Línea de cierre
    $this->Cell(array_sum($w), 0, '', 'T');
}

}

$pdf = new PDF();
// Generar pie de página
$pdf->AliasNbPages();
$pdf->AddPage();

// Datos
$data = [
    ['Boleta', $boleta],
    ['Nombre Completo', $nombre_completo],
    ['Teléfono', $telefono],
    ['Semestre', $semestre],
    ['Carrera', $carrera],
    ['Preferencia de Tutor', $preferencia_tutor],
    ['Nombre del Tutor', $nombre_tutor],
    ['Email', $email],
    ['Tipo de Tutoría', $tutoria],
];


// Generar la tabla con los datos
$pdf->Table($data);

// Salida del PDF
$pdf->Output();
?>
