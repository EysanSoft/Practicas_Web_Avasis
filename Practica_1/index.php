<?php
// Petición directa con cURL.
$url = "https://jsonplaceholder.typicode.com/posts";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
curl_close($ch);
$posts = json_decode($response, true);
/*
echo "<pre>";
var_dump($posts);
echo "</pre>";
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Práctica 1 / Peticiones con JS & PHP</title>
  <!-- <link href="./bootstrap-5.3.3/dist/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php include '../layout/navbar.php'; ?>
  <!-- Formulario de demostración. -->
  <div class="row mx-5 mt-3 justify-content-center">
    <div class="col-6">
      <h1 class="text-center">Inputs</h1>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Correo</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, minima?</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>
    </div>
  </div>
  <!-- Select vacio para llenar con Jquery. -->
  <div class="row mx-5 mt-3 justify-content-center">
    <div class="col-6">
      <select class="form-select" id="post" aria-label="Default select example">
      </select>
    </div>
  </div>
  <!-- Select con las opciones concatenadas directamente desde la Petición cURL PHP. -->
  <div class="row mx-5 mt-3 justify-content-center">
    <div class="col-6">
      <select class="form-select" id="post-2" aria-label="Default select example">
        <?php
        foreach ($posts as $post) {
          echo "<option value=''>";
          echo $post['title'];
          echo "</option>";
        }
        ?>
      </select>
    </div>
  </div>
  <!-- <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../libs/jquery-3.7.1.min.js"></script>
  <script src="scripts/javascript/peticiones.js"></script>
</body>
</html>
