<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main>
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
                <?php
                    session_start();
                    if (!isset($_SESSION['id'])) {
                        echo '<div class="alert alert-danger"><p></p></div>';
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
                                timer: 1500,
                                toast: true
                            });
                        });
                      </script>";
                    }
                ?>
            </div>
        </div>
    </main>
    </main>
</body>
</html>