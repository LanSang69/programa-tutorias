<?php

include("config.php");

if(isset($_POST['input'])) {

    $input = $_POST['input'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM Usuario WHERE numero_boleta LIKE ? OR nombre LIKE ? OR apellido_paterno LIKE ? OR apellido_materno LIKE ? OR telefono LIKE ? OR email LIKE ?");
    $param = "%{$input}%";
    $stmt->bind_param("ssssss", $param, $param, $param, $param, $param, $param);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número de boleta</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Preferencia de tutor</th>
                    <th scope="col">Correo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td> <?php echo htmlspecialchars($row['numero_boleta']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['nombre']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['apellido_paterno']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['apellido_materno']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['telefono']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['semestre']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['carrera']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['preferencia_tutor']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['email']); ?> </td>
                        <td>
                            <a href="modificar.php?boleta=<?= htmlspecialchars($row['numero_boleta']) ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="index.php?boleta=<?=$row['numero_boleta']?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'> No se encontró </h6>";
    }

    $stmt->close();
    $con->close();
}

?>