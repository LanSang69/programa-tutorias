<?php
    session_start();
    if (!isset($_SESSION['alumno_id'])) {
        echo '<div class="alert alert-danger"><p>No tienes permiso de estar en esta página</p></div>';
        header("refresh:1; url=../index.html");
        exit;
    } else {
        echo '<div class="mb-4"><h1>Bienvenido Admin</h1></div>';
        echo "<div class=\"alert alert-info\"><p>Correo: {$_SESSION['email']}</p></div>";

        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Login exitoso',
                showConfirmButton: false,
                timer: 2000,
                toast: true
            });
        });
        </script>";
    }
?>