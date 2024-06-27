<?php

if(!empty($_POST["guardar"])) {
    if(!empty($_POST["nombre"]) and !empty($_POST["ap"]) and !empty($_POST["am"]) and
    !empty($_POST["telefono"]) and !empty($_POST["semestre"]) and !empty($_POST["carrera"]) and
    !empty($_POST["pt"]) and !empty($_POST["correo"])){
        $boleta = $_POST["boleta"];
        $nombre = $_POST["nombre"];
        $ap = $_POST["ap"];
        $am = $_POST["am"];
        $telefono = $_POST["telefono"];
        $semestre = $_POST["semestre"];
        $carrera = $_POST["carrera"];
        $pt = $_POST["pt"];
        $correo = $_POST["correo"];

        $sql = $conexion -> query(" UPDATE Usuario SET nombre='$nombre', apellido_paterno='$ap',
        apellido_materno='$am', telefono='$telefono', semestre=$semestre, carrera='$carrera',
        preferencia_tutor='$pt', email='$correo' where numero_boleta='$boleta' ");
        if($sql==1){

            header("location:index.php");
        } else{
            echo '<script>swal({
                            title: \'Error al modificar!\',
                            icon: \'error\',
                            button: {
                                className: \'bc\'
                              }
                        })
                    </script>';
        }
    }else{
        echo '<script>swal({
                            title: \'Error al eliminar!\',
                            icon: \'error\',
                            button: {
                                className: \'bc\'
                              }
                        })
                    </script>';
    }
}

?>