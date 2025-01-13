<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Práctica 3 / Tabla Usuarios</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!-- <link href="../../node_modules/dropify/dist/css/dropify.css" rel="stylesheet">
    <link href="../../node_modules/dropify/dist/fonts/*" rel="stylesheet"> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">Prácticas Iván</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../index.php">Index</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Práctica 1
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="../../Practica_1/index.php">Peticiones con JS & PHP</a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="../../Practica_1/views/ejemplos_bs.html">Demo Boostrap</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Practica_2/index.php">
                            Práctica 2 / Tabla y Dropdown
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle active"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Práctica 3
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="../index.php">Formulario con Jquery Submit</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./ejemplos_jquery.html">Demo Jquery</a>
                            </li>
                            <li>
                                <a class="dropdown-item active" href="./tabla_usuarios.php">Tabla Usuarios</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tabla Usuarios. -->
    <div class="row mt-5 justify-content-center">
        <div class="col-10">
            <div class="table-responsive">
                <table class="table table-primary table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tablaUsuarios">
                        <tr>
                            <td colspan='6'><b>Sin datos...</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Editar Usuario. -->
    <div
        class="modal fade"
        id="modalEditarUsuario"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <b>Editar Usuario</b>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mx-3 mt-2 justify-content-center">

                        <div class="col-12" id="contenedorDinamico1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page">Datos de Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCambiarContra">Cambiar Contraseña</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCambiarFotoDePerfil">Cambiar Foto de Perfil</a>
                                </li>
                            </ul>
                            <form action="../scripts/php/peticion_editar_usuarios.php" class="form" id="editarUsuariosForm" method="POST">
                                <!-- Datos... -->
                            </form>
                        </div>

                        <div class="col-12" id="contenedorDinamico2">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCambiarUsuario">Datos de Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page">Cambiar Contraseña</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCambiarFotoDePerfil">Cambiar Foto de Perfil</a>
                                </li>
                            </ul>
                            <form action="../scripts/php/peticion_editar_contra.php" class="form" id="editarContraForm" method="POST">
                                <!-- <div class="mb-3">
                                    <label for="contraOG" class="form-label">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="contraOG" name="contraOG" required/>
                                </div> -->
                                <div class="mb-3">
                                    <label for="contra" class="form-label">Contraseña Nueva</label>
                                    <input type="password" class="form-control" id="contra" name="contra" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="conContra" class="form-label">Confirmar Contraseña Nueva</label>
                                    <input type="password" class="form-control" id="conContra" name="conContra" required/>
                                </div>
                                <div class="alert alert-danger" id="mensajeConNoCoin" role="alert">
                                    ¡La contraseñas ingresadas no coinciden! Vuelva a intentarlo.
                                </div>
                                <!-- <div class="alert alert-danger" id="mensajeConInco" role="alert">
                                    ¡La contraseña ingresada es incorrecta! Vuelva a intentarlo.
                                </div> -->
                                <div class="mb-3">
                                    <button class="btn btn-primary" id="submit">Cambiar de Contraseña</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-12" id="contenedorDinamico3">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCambiarUsuario">Datos de Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCambiarContra">Cambiar Contraseña</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page">Cambiar Foto de Perfil</a>
                                </li>
                            </ul>
                            <form action="../scripts/php/peticion_editar_foto_perfil.php" class="form" id="editarFotoPerfilForm" method="POST">
                                <div class="row my-3 justify-content-center">
                                    <div class="col-5">
                                        <img src="../images/foto_de_perfil.png" class="img-fluid" alt="Foto de perfil actual.">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="fotoDePerfil" class="form-label">Imagen</label> -->
                                    <input type="file" class="form-control" id="fotoDePerfil" name="fotoDePerfil" accept=".jpg, .jpeg, .png" required/>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" id="submit">Cambiar Foto de Perfil</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Eliminar Usuario. -->
    <div
        class="modal fade"
        id="modalEliminarUsuario"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <b>Eliminar Usuario</b>
                </div>
                <div class="modal-body">
                    <div class="row mx-3 mt-2 justify-content-center">
                        <div class="col-12">
                            <h4 class="text-center">¿Estas seguro de que quieres eliminar a este usuario?</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modalEliminarUsuarioFooter">
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="../../libs/jquery-3.7.1.min.js"></script>
    <!-- <script>src="../../node_modules/dropify/dist/js/dropify.js"</script> -->
    <script src="../scripts/javascript/tabla_usuarios.js"></script>
</body>

</html>