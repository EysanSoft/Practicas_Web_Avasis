<?php

use Dompdf\Dompdf;
use Dompdf\Options;

include "../../../Practica_3/scripts/php/shared/endpoints.php";
require '../../../vendor/autoload.php';

$url = EndPoints::$apiUrl . EndPoints::$obtenerUsuario;

include "../../../Practica_3/scripts/php/shared/curl_opts/get_opt.php";

$response = json_decode($response);
$dataArray = $response->data;

if ($dataArray == null) {
    $response = ["status" => false, "message" => "No hay usuarios registrados."];
    echo json_encode($response);
}
else {
    // Inicializar opciones de Dompdf.
    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);

    // Inicializar Dompdf.
    $dompdf = new Dompdf($options);

    // For magico.
    $magia = "";
    for ($i = 0; $i < count($dataArray); $i++) {
        $magia .= '<tr>';
        $magia .= '<td>'. $dataArray[$i] -> name .'</td>';
        $magia .= '<td>'. $dataArray[$i] -> lastName .'</td>';
        $magia .= '<td>'. $dataArray[$i] -> phone .'</td>';
        $magia .= '<td>'. $dataArray[$i] -> email .'</td>';
        $magia .= '<tr>';
    }

    // Escribir y cargar HTML.
    $docHTML = "
        <!DOCTYPE html>
        <html lang='en'>

        <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Usuarios Avasis API</title>
        <style>
            table {
            width: 100%;
            border-collapse: collapse;
            }

            table,
            th,
            td {
            border: 1px solid black;
            }
        </style>
        </head>

        <body>
        <div>
            <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                </tr>
            </thead>
            <tbody>
    "
    .
    $magia
    .
    "
            </tbody>
            </table>
        </div>
        </body>
        </html>
    ";
            
    // $docHTML = "../../views/tabla_usuarios.php";

    $dompdf->loadHtml($docHTML);

    // Configurar opciones de renderizado...
    $dompdf->setPaper('A4', 'landscape');

    // Renderizar PDF.
    $dompdf->render();

    /*
    // Salida del PDF en el navegador.
    $dompdf->stream("usuarios_avasis_api.pdf");
    */

    // Salida del PDF guardado en la carpeta resources.
    $output = $dompdf->output();
    file_put_contents("../../../resources/pdf/usuarios_avasis_api.pdf", $output);

    $response = ["status" => true, "message" => "Archivo PDF descargado."];
    echo json_encode($response);
}
