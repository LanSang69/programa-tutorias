<?php

$con = mysqli_connect("localhost", "root", "", "Tutorias");

if(!$con){
    echo "Conexion fallida" . mysqli_connect_error();
}

?>