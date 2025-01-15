<?php
include 'scripts/php/peticion_indice.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Práctica 2 / Tabla y Dropdown</title>
  <!-- <link href="./bootstrap-5.3.3/dist/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php include '../layout/navbar.php'; ?>
  <!-- Select -->
  <div class="row mx-5 mt-3 justify-content-center">
    <div class="col-2">
      <select id="dropdownIndexTable" name="dropdownIndexTable" class="form-select" aria-label="Elige una opción">
        <option value="1" selected disabled hidden>Elige una opción</option>
        <?php
        /*
        Segun lo obtenido en la petición directa cURL GET,
        se concatena los resultados en el select con un foreach.
        */
        foreach ($posts as $post) {
          echo "<option value=" . $post['id'] . ">" . $post['title'] . "</option>";
        }
        ?>
      </select>
    </div>
  </div>
  <!-- Tabla -->
  <div class="row mt-5 justify-content-center">
    <div class="col-10">
      <div class="table-responsive">
        <table class="table table-danger table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Cuerpo</th>
            </tr>
          </thead>
          <tbody id="miTabla">
            <tr>
              <td colspan='4'>Seleccione un nombre para ver los comentarios.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../libs/jquery-3.7.1.min.js"></script>
  <script src="scripts/javascript/procesar_tabla_&_dropdown.js"></script>
</body>

</html>