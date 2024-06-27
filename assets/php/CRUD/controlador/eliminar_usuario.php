<?php

if(!empty($_GET["boleta"])){
    $boleta = $_GET["boleta"];
    $sql = $conexion -> query(" DELETE from Usuario where numero_boleta='$boleta'");
    if($sql==1){
        echo "<script>swal({
                    title: 'Usuario de boleta $boleta eliminado!',
                    icon: 'success',
                    button: {
                        className: 'bs'
                      }
                })
            </script>";
    } else{
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