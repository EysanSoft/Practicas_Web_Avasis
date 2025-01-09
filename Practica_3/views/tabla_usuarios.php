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
            <button class="btn btn-primary" id="botonModalEU">Editar</button>
        </div>
    </div>
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
                    Editar Usuario
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mx-3 mt-2 justify-content-center">
                        <div class="col-12">

                            <form
                                action="../scripts/php/editar_usuarios.php"
                                class="form"
                                id="editarUsuariosForm"
                                method="POST">
                                <div class="d.none">
                                    <input
                                        type="hidden"
                                        class="form-control"
                                        id="id"
                                        name="id"
                                        value="6"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nombre"
                                        name="nombre"
                                        maxlength="15"
                                        value="Eyssy"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="apellido"
                                        name="apellido"
                                        maxlength="30"
                                        value="Hernandez Sanchez"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="correo"
                                        name="correo"
                                        value="dummy23@outlook.com"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="telefono"
                                        name="telefono"
                                        value="9617654321"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="contra" class="form-label">Contraseña</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="contra"
                                        name="contra"
                                        value="newSecret"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="conContra" class="form-label">Confirmar Contraseña</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="conContra"
                                        name="conContra"
                                        value="newSecret"
                                    />
                                </div>
                                <div class="alert alert-danger" id="mensajeContraNoCo" role="alert">
                                    ¡La contraseñas ingresadas no coinciden! Vuelva a intentarlo.
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" id="submit">Ingresar</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../../libs/jquery-3.7.1.min.js"></script>
    <script src="../scripts/javascript/tabla_usuarios.js"></script>
</body>
</html>
