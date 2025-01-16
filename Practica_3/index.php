<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Práctica 3 / Formulario con Jquery Submit</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <?php include '../layout/navbar.php'; ?>
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
  <!-- Modal con mensaje. -->
  <div
    class="modal fade"
    id="modalAlert"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p>Atención</p>
        </div>
        <div class="modal-body" id="contenidoModal">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="botonCerrarModal" data-bs-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <?php include '../layout/scripts.php'; ?>
  <script src="scripts/javascript/formulario_registro_de_usuarios.js?v=<?php echo uniqid() ?>"></script>
</body>
</html>
