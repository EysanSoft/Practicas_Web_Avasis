<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Práctica 3 / Demo Jquery</title>
  <link rel="stylesheet" href="styles/index.css" />
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
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Práctica 1
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../../Practica_1/index.php">Peticiones con JS & PHP</a></li>
              <li><a class="dropdown-item" href="../../Practica_1/views/ejemplos_bs.php">Demo Boostrap</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Practica_2/index.php">Práctica 2 / Tabla y Dropdown</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Práctica 3
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../index.php">Registro de Usuarios (C)</a></li>
              <li><a class="dropdown-item active" href="./ejemplos_jquery.php">Demo Jquery</a></li>
              <li><a class="dropdown-item" href="./tabla_usuarios.php">Tabla de Usuarios (RUD)</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Practica_4/index.php">Práctica 4 / Usuarios y Documentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Practica_5/index.php">Práctica 5 / Gráficas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="row mx-5 mt-3 text-center">
    <div class="col">
      <h1>Uso de JQuery</h1>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <h2>Greetings</h2>
      <div class="inner">Hello</div>
      <div class="inner">Goodbye</div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p id="customSelector1">I would like to say:</p>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <input id="check1" type="checkbox" checked="checked" />
      <label for="check1">Check me</label>
      <p id="customSelector2"></p>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p>Hello (this is a paragraph)</p>
      <div class="customSelector3">
        <span>Hello Again (this span is a child of the customSelector3)</span>
      </div>
      <p>And <span>Again</span> (in another paragraph)</p>
      <div class="customSelector3">
        And One Last <span>Time</span> (most text directly in the
        customSelector3)
      </div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <div id="target">Click here</div>
      <div id="other">Trigger the handler</div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p id="customSelector4">
        Hello <a href="https://johnresig.com/">John</a>, how are you doing?
      </p>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <span id="result">&nbsp;</span>
      <div class="customStyle1" style="background-color: blue"></div>
      <div
        class="customStyle1"
        style="background-color: rgb(15, 99, 30)"></div>
      <div class="customStyle1" style="background-color: #123456"></div>
      <div class="customStyle1" style="background-color: #f11"></div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <button class="customStyle2">Get "blah" from the div</button>
      <button class="customStyle2">Set "blah" to "hello"</button>
      <button class="customStyle2">Set "blah" to 86</button>
      <button class="customStyle2">Remove "blah" from the div</button>
      <p>
        The "blah" value of this <strong>p</strong> is
        <span id="customSelector5">?</span>
      </p>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p><button id="customSelector6">Run</button></p>
      <div class="customStyle3 first"></div>
      <div class="customStyle3 second"></div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <div class="customStyle4">Click here</div>
      <div class="customStyle4">to iterate through</div>
      <div class="customStyle4">these divs.</div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p id="customSelector7">
        Hello, <span>Person</span> <em>and person</em>.
      </p>
      <button id="customSelector8">Call empty() on above paragraph</button>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <ul style="color: blue">
        <li class="customStyle5">Milk</li>
        <li class="customStyle5">Bread</li>
        <li class="customStyle5">Chips</li>
        <li class="customStyle5">Socks</li>
      </ul>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p class="customSelector9">there, friend!</p>
      <p class="customSelector9">amigo!</p>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <button id="customSelector10">Go</button>
      <p id="customSelector11">Ready...</p>
      <div class="customStyle6"></div>
      <div class="customStyle6"></div>
      <div class="customStyle6"></div>
      <div class="customStyle6"></div>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <button class="customStyle7">First</button>
      <button class="customStyle7">Second</button>
      <button class="customStyle7">Third</button>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <div>Try scrolling this webpage.</div>
      <p class="customSelector12">
        Paragraph - <span class="customStyle9">Scroll happened!</span>
      </p>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <p id="customSelector12"></p>
      <select id="single">
        <option>Single</option>
        <option>Single2</option>
      </select>
      <select id="multiple" multiple="multiple">
        <option selected="selected">Multiple</option>
        <option>Multiple2</option>
        <option selected="selected">Multiple3</option>
      </select>
    </div>
  </div>

  <div class="row mx-5 mt-3">
    <div class="col">
      <button class="customSelector13">Button #1</button>
      <button class="customSelector13">Button #2</button>
      <div><span class="customSelector14">0</span> button #1 clicks.</div>
      <div><span class="customSelector14">0</span> button #2 clicks.</div>
    </div>
  </div>

  <div class="row mx-5 my-3">
    <div class="col">
      <select id="customSelector15" name="sweets" multiple="multiple">
        <option>Chocolate</option>
        <option selected="selected">Candy</option>
        <option>Taffy</option>
        <option selected="selected">Caramel</option>
        <option>Fudge</option>
        <option>Cookie</option>
      </select>
      <div id="customSelector16" style="color: red"></div>
    </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="../../libs/jquery-3.7.1.min.js"></script>
  <script src="../scripts/javascript/ejemplos_jquery.js"></script>
</body>

</html>