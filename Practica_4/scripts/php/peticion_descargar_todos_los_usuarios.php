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
    $rowArray,   // The data to set
    NULL,        // Array values with this value will not be set
    'A1'         // Top left coordinate of the worksheet range where we want to set these values (default is A1)
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
