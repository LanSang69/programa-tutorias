<?php
include "modelo/conexion.php";
$boleta = $_GET["boleta"];

$sql = $conexion->query(" SELECT * from Usuario where numero_boleta = $boleta ");
    
?>

<!DOCTYPE html>
<html lang="sn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Modificar </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST">
    <h5 class="text-center alert alert-secondary"> Modificar </h5>
    <input type="hidden" name="boleta" value="<?= $_GET["boleta"] ?>">
    <?php
    include "controlador/modificar_usuario.php";
    while($datos = $sql -> fetch_object()){?>
        <div class="mb-1">
            <label for="nombre" class="form-label"> Nombre </label>
            <input type="text" class="form-control" name="nombre" value="<?= $datos -> nombre ?>">
        </div>
        <div class="mb-1">
            <label for="ap" class="form-label"> Apellido paterno </label>
            <input type="text" class="form-control" name="ap" value="<?= $datos -> apellido_paterno ?>">
        </div>
        <div class="mb-1">
            <label for="am" class="form-label"> Apellido materno </label>
            <input type="text" class="form-control" name="am" value="<?= $datos -> apellido_materno ?>">
        </div>
        <div class="mb-1">
            <label for="telefono" class="form-label"> Telefono </label>
            <input type="text" class="form-control" name="telefono" value="<?= $datos -> telefono ?>">
        </div>
        <div class="mb-1">
            <label for="semestre" class="form-label"> Semestre </label>
            <input type="text" class="form-control" name="semestre" value="<?= $datos -> semestre ?>">
        </div>
        <div class="mb-1">
            <label for="carrera" class="form-label"> Carrera </label>
            <input type="text" class="form-control" name="carrera" value="<?= $datos -> carrera ?>">
        </div>
        <div class="mb-1">
            <label for="pt" class="form-label"> Preferencia de tutor </label>
            <input type="text" class="form-control" name="pt" value="<?= $datos -> preferencia_tutor ?>">
        </div>
        <div class="mb-1">
            <label for="correo" class="form-label"> Correo </label>
            <input type="text" class="form-control" name="correo" value="<?= $datos -> email ?>">

    <?php }
    ?>
    
        <button type="submit" class="btn btn-primary" name="guardar" value="ok"> Modificar </button>
    </div>
    </form>
</body>
</html>
