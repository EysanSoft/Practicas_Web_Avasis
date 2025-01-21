<?php
include "../../../Practica_3/scripts/php/shared/endpoints.php";
require '../../../vendor/autoload.php';

$url = EndPoints::$apiUrl . EndPoints::$obtenerUsuario;

include "../../../Practica_3/scripts/php/shared/curl_opts/get_opt.php";

$response = json_decode($response);
$dataArray = $response->data;

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");

$rowArray = ['Nombre', 'Apellido', 'Telefono', 'Correo', 'Imagen'];
$spreadsheet->getActiveSheet()->fromArray(
    $rowArray,   // Los valores a establecer en la hoja de cálculo.
    NULL,        // Los valores nulos se establecen en blanco.
    'A1'         // Las cordenadas para insertar los valores. (Por defecto, A1).
);

if($dataArray == null) {
    $response = ["status" => false, "message" => "No hay usuarios registrados."];
    echo json_encode($response);
}
else {
    for ($i = 0; $i < count($dataArray); $i++) {
        $rowArray = [$dataArray[$i]->name, $dataArray[$i]->lastName, $dataArray[$i]->phone, $dataArray[$i]->email, $dataArray[$i]->image];
        $spreadsheet->getActiveSheet()->fromArray(
            $rowArray,  
            NULL,       
            'A' . strval(2 + $i)
        );
    }
    $writer->save("../../../resources/spreadsheets/usuarios_avasis_api.xlsx");
    $response = ["status" => true, "message" => "Hoja de cálculo descargada."];
    echo json_encode($response);
}
?>
