<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4 / Registro de Usuarios por Xlsx</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Prácticas Iván</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Index</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Práctica 1
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Practica_1/index.php">Peticiones con JS & PHP</a></li>
                            <li><a class="dropdown-item" href="../Practica_1/views/ejemplos_bs.php">Demo Boostrap</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Practica_2/index.php">Práctica 2 / Tabla y Dropdown</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Práctica 3
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Practica_3/index.php">Formulario con Jquery Submit</a></li>
                            <li><a class="dropdown-item" href="../Practica_3/views/ejemplos_jquery.php">Demo Jquery</a></li>
                            <li><a class="dropdown-item" href="../Practica_3/views/tabla_usuarios.php">Tabla Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">Práctica 4 / Registro de Usuarios por Xlsx</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Formulario -->
    <div class="row mx-5 mt-5 justify-content-center">
        <div class="col-3">
            <form
                action="scripts/php/peticion_registrar_usuarios.php"
                class="form"
                id="formularioRegistrarUsuariosConXlsx"
                method="POST">
                <div class="mb-3">
                    <label for="hojaDeCalculo" class="form-label">Hoja de Cálculo</label>
                    <input type="file" class="form-control" id="hojaDeCalculo" name="hojaDeCalculo" accept=".xlsx" required/>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" id="submitRegistrarUsuariosConXlsx">Registrar Usuarios</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Botón de descarga -->
    <div class="row mx-5 mt-5 justify-content-center">
        <div class="col-3 text-center">
            <button class="btn btn-success" id="botonDescargarTodosUsuarios" onClick="descargarTodosLosUsuarios()">Descargar todos los usuarios</button>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="../libs/jquery-3.7.1.min.js"></script>
    <script src="./scripts/javascript/funciones_usuarios_&_hojas_de_calculo.js"></script>
</body>
</html>
