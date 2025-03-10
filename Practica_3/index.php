<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Usuarios (C)</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link
    href="../node_modules/sweetalert2/dist/sweetalert2.min.css"
    rel="stylesheet" />
</head>

<body>
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
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Práctica 3
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item active" href="./index.php">Registro de Usuarios (C)</a></li>
              <li><a class="dropdown-item" href="./views/ejemplos_jquery.php">Demo Jquery</a></li>
              <li><a class="dropdown-item" href="./views/tabla_usuarios.php">Tabla de Usuarios (RUD)</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Practica_4/index.php">Práctica 4 / Usuarios y Documentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Practica_5/index.php">Práctica 5 / Gráficas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Formulario de registro. -->
  <div class="row mx-5 mt-5 justify-content-center">
    <div class="col-3">
      <form
        action="scripts/php/peticion_registrar_usuario.php"
        class="form"
        id="myForm"
        method="POST">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            maxlength="15"
            required />
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input
            type="text"
            class="form-control"
            id="apellido"
            name="apellido"
            maxlength="30"
            required />
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo</label>
          <input
            type="email"
            class="form-control"
            id="correo"
            name="correo"
            required />
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Telefono</label>
          <input
            type="tel"
            class="form-control"
            id="telefono"
            name="telefono"
            required />
        </div>
        <div class="mb-3">
          <label for="contra" class="form-label">Contraseña</label>
          <input
            type="password"
            class="form-control"
            id="contra"
            name="contra"
            required />
          <small>Minimo 8 caracteres, una letra en mayuscula y otra en minuscula, un numero y un simbolo especial (#?!@$%^&*-)</small>
        </div>
        <div class="mb-3">
          <label for="conContra" class="form-label">Confirmar Contraseña</label>
          <input
            type="password"
            class="form-control"
            id="conContra"
            name="conContra"
            required />
        </div>
        <div class="alert alert-danger" id="mensajeError" role="alert">
          ¡La contraseñas ingresadas no coinciden! Vuelva a intentarlo.
        </div>
        <div class="mb-3">
          <button class="btn btn-primary submitRegistrarUsuario" id="submit">Registrarte</button>
        </div>
      </form>
    </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="../libs/jquery-3.7.1.min.js"></script>
  <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="scripts/javascript/formulario_registro_de_usuarios.js?v=<?php echo uniqid() ?>"></script>
</body>

</html>