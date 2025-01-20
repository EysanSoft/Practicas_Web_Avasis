<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Práctica 1 / Demo Boostrap</title>
  <!-- <link href="./bootstrap-5.3.3/dist/css/bootstrap.min.css"> -->
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">Index</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Práctica 1
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../index.php">Peticiones con JS & PHP</a></li>
              <li><a class="dropdown-item active" href="./ejemplos_bs.php">Demo Boostrap</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Practica_2/index.php">Práctica 2 / Tabla y Dropdown</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Práctica 3
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../../Practica_3/index.php">Formulario con Jquery Submit</a></li>
              <li><a class="dropdown-item" href="../../Practica_3/views/ejemplos_jquery.php">Demo Jquery</a></li>
              <li><a class="dropdown-item" href="../../Practica_3/views/tabla_usuarios.php">Tabla Usuarios</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Practica_4/index.php">Práctica 4 / Registro de Usuarios por Xlsx</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Sistema Grid. -->
  <h1 class="text-center mt-3">Sistema Grid</h1>
  <div class="row mx-5 mt-3 justify-content-around">
    <div class="col-sm-4 col-md-4 col-lg-4 bg-primary">
      <h2>Tablas</h2>
      <p>Contenido de la columna 1.</p>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8 bg-secondary">
      <h2>Grid</h2>
      <p>Contenido de la columna 2.</p>
    </div>
  </div>
  <div class="row mx-5 mt-3 justify-content-around">
    <div class="col-sm-4 col-md-4 col-lg-4 bg-warning">
      <h2>Inputs</h2>
      <p>Contenido de la columna 2.</p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 bg-danger">
      <h2>Modales</h2>
      <p>Contenido de la columna 2.</p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 bg-dark text-white">
      <h2>Select</h2>
      <p>Contenido de la columna 2.</p>
    </div>
  </div>
  <!-- Tablas. -->
  <div class="row mx-5 mt-3">
    <div class="col">
      <h1 class="text-center">Tablas</h1>
      <div class="table-responsive">
        <table
          class="table table-success table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Doe</td>
              <td>dummy1@hotmail.com</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Johnson</td>
              <td>dummy2@outlook.com</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">EysanSoft</td>
              <td>dummy16@gmail.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Formularios / Inputs. -->
  <div class="row mx-5 mt-3 justify-content-center">
    <div class="col-6">
      <h1 class="text-center">Inputs</h1>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Correo</label>
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp" />
          <div id="emailHelp" class="form-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas,
            minima?
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1" />
        </div>
        <div class="mb-3 form-check">
          <input
            type="checkbox"
            class="form-check-input"
            id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>
    </div>
  </div>
  <!-- Modales. -->
  <!-- Boton -->
  <div class="row mx-5 mt-3 justify-content-center">
    <h1 class="text-center mt-3">Modales</h1>
    <button
      type="button"
      class="btn btn-danger text-white"
      data-bs-toggle="modal"
      data-bs-target="#staticBackdrop">
      Mostrar Modal.
    </button>
  </div>
  <!-- Modal -->
  <div
    class="modal fade"
    id="staticBackdrop"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Titulo</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab aliquid
          repudiandae unde sequi tempore veniam cumque nisi nulla expedita,
          quam hic aperiam. Fugiat ut ab cupiditate obcaecati perferendis
          adipisci ad?
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal">
            Cerrar
          </button>
          <button type="button" class="btn btn-success">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Select. -->
  <h1 class="text-center mt-3">Select</h1>
  <div class="row mx-5 my-3 justify-content-center">
    <div class="col-6">
      <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
  </div>
  <!-- Modal con Tabs -->
  <h1 class="text-center mt-3">Modal con Tabs</h1>
  <div class="row mx-5 my-3 justify-content-center">
    <div class="col-6">
      <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
        data-whatever="login">
        Login
      </button>

      <button
        type="button"
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
        data-whatever="signup">
        Signup
      </button>

      <button
        type="button"
        class="btn btn-warning"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
        data-whatever="default">
        Open Modal
      </button>

      <!-- Modal Structure -->
      <div
        class="modal fade"
        id="myModal"
        tabindex="-1"
        aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Login or Signup</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="login-tab"
                    data-bs-toggle="tab"
                    href="#login"
                    role="tab"
                    aria-controls="login"
                    aria-selected="true">Login</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="signup-tab"
                    data-bs-toggle="tab"
                    href="#signup"
                    role="tab"
                    aria-controls="signup"
                    aria-selected="false">Signup</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div
                  class="tab-pane fade show active"
                  id="login"
                  role="tabpanel"
                  aria-labelledby="login-tab">
                  <form>
                    <div class="mb-3">
                      <label for="login-email" class="form-label">Email address</label>
                      <input
                        type="email"
                        class="form-control"
                        id="login-email"
                        placeholder="Enter email"
                        required />
                    </div>
                    <div class="mb-3">
                      <label for="login-password" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="login-password"
                        placeholder="Password"
                        required />
                    </div>
                    <button type="submit" class="btn btn-primary">
                      Login
                    </button>
                  </form>
                </div>
                <div
                  class="tab-pane fade"
                  id="signup"
                  role="tabpanel"
                  aria-labelledby="signup-tab">
                  <form>
                    <div class="mb-3">
                      <label for="signup-email" class="form-label">Email address</label>
                      <input
                        type="email"
                        class="form-control"
                        id="signup-email"
                        placeholder="Enter email"
                        required />
                    </div>
                    <div class="mb-3">
                      <label for="signup-password" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="signup-password"
                        placeholder="Password"
                        required />
                    </div>
                    <div class="mb-3">
                      <label for="signup-confirm-password" class="form-label">Confirm Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="signup-confirm-password"
                        placeholder="Confirm Password"
                        required />
                    </div>
                    <button type="submit" class="btn btn-success">
                      Signup
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    // JavaScript to switch tabs based on the button clicked
    document
      .getElementById("myModal")
      .addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var tabToShow = button.getAttribute("data-whatever"); // Extract info from data-* attributes
        // Switch to the appropriate tab
        if (tabToShow === "login") {
          var loginTab = new bootstrap.Tab(
            document.getElementById("login-tab")
          );
          loginTab.show();
        } else if (tabToShow === "signup") {
          var signupTab = new bootstrap.Tab(
            document.getElementById("signup-tab")
          );
          signupTab.show();
        } else {
          var defaultTab = new bootstrap.Tab(
            document.getElementById("login-tab")
          );
          defaultTab.show(); // Default to login if 'default' button is clicked
        }
      });
  </script>
</body>

</html>