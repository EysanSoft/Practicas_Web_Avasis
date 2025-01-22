<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 5 / Gráficas</title>
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
                            <li><a class="dropdown-item" href="../Practica_3/index.php">Registro de Usuarios (C)</a></li>
                            <li><a class="dropdown-item" href="../Practica_3/views/ejemplos_jquery.php">Demo Jquery</a></li>
                            <li><a class="dropdown-item" href="../Practica_3/views/tabla_usuarios.php">Tabla de Usuarios (RUD)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Practica_4/index.php">Práctica 4 / Usuarios y Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">Práctica 5 / Gráficas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row mx-5 justify-content-center">
        <div class="col-6" id='myDiv1'>
        </div>
    </div>
    <div class="row mx-5 justify-content-center">
        <div class="col-6" id='myDiv2'>
        </div>
    </div>
    <div class="row mx-5 justify-content-center">
        <div class="col-6" id='myDiv3'>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script src="../libs/jquery-3.7.1.min.js"></script>
    <script src="../node_modules/plotly.js-dist-min/plotly.min.js"></script>
    <script>
        var data1 = [{
            x: ['giraffes', 'orangutans', 'monkeys'],
            y: [20, 14, 23],
            type: 'bar'
        }];

        var trace1 = {
            x: [1, 2, 3, 4],
            y: [10, 15, 13, 17],
            type: 'scatter'
        };

        var trace2 = {
            x: [1, 2, 3, 4],
            y: [16, 5, 11, 9],
            type: 'scatter'
        };

        var data2 = [trace1, trace2];

        var data3 = [{
            values: [19, 26, 55],
            labels: ['Residential', 'Non-Residential', 'Utility'],
            type: 'pie'
        }];
        /*
        var layout = {
            height: 400,
            width: 500
        };
        */
        Plotly.newPlot('myDiv1', data1);
        Plotly.newPlot('myDiv2', data2);
        Plotly.newPlot('myDiv3', data3);
    </script>
</body>

</html>