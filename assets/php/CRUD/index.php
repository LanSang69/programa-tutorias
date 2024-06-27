<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Tutorías</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/dbcc6a844b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/gen.css">
    <link rel="stylesheet" href="../../css/login_alumno.css">
</head>

<body>
<script>
    function eliminar() {
        var resp = confirm("¿Estás seguro de que deseas eliminar este usuario?");
        return resp;
    }    
</script>
    <header>
        <div class="d-flex align-items-center justify-content-center">
            <img src="../../images/logos/ipn.png" alt="logo IPN" />
            <h1 class="title" width="100%""><strong>Programa de Tutorías</strong></h1>
            <img src=" ../../images/logos/escom.png" alt="logo ESCOM""/>
        </div>
    </header>
    
    <nav class=" navbar navbar-expand-sm nav-content" ng-controller="navSection">
                <div class="container d-flex justify-content-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-text">Menú desplegable</span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                        <ul class="navbar-nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="../../../index.html"><b>Inicio</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../../pantallas/registro.html"><b>Registro</b></a>
                            </li>
                            <li class="nav-item nav-item-active">
                                <a class="nav-link" href="../../../pantallas/form_admin.html""><b>Admin</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../../pantallas/login_alumno.html"><b>Generar pdf</b></a>
                            </li>
                        </ul>
                    </div>
                </div>
    </nav>
    <main>
        <h1 class="text-center p-3" ><strong> Página administrador </strong></h1>
        <div class="container search input-box" style="max-width: 50%;">
            <input type="text" value="<?php ?>" class="form-control" id="input" name="input" autocomplete="off" placeholder="Buscar...">
        </div>
    
        <div id="search-results"></div>
    
        <div class="container-fluid row pt-4">
            <div class="text-center m-auto">
            </div>
        </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="search.js"></script>

</body>

</html>
