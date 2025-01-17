<?php
include "../../../Practica_3/scripts/php/shared/endpoints.php";
require '../../../vendor/autoload.php';
$status = false;
$nombreDocumento = $_FILES["hojaDeCalculo"]["name"];
$tempNombreDocumento = $_FILES["hojaDeCalculo"]["tmp_name"];
$extension = explode(".", $nombreDocumento);

if ($extension[1] == "xlsx" || $extension[1] == "xls") {
    $rutaDeHoja = "../../../resources/spreadsheets/$nombreDocumento";

    if (move_uploaded_file($tempNombreDocumento, $rutaDeHoja)) {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader -> load($rutaDeHoja);
        $worksheet = $spreadsheet -> getActiveSheet();
        $registrosFallidos = [];

        foreach ($worksheet->getRowIterator() as $row) {
            $i = 0;
            $cellIterator = $row -> getCellIterator();
            $cellIterator -> setIterateOnlyExistingCells(FALSE);
            $datosExtraidos = array();

            foreach ($cellIterator as $cell) {  
                $datosExtraidos[] = $cell -> getValue();
                $i++;
            }
            // Validar los datos...
            if($datosExtraidos[0] != "NOMBRE") {
                $entradaRegistrada = registrar($datosExtraidos);
                if ($entradaRegistrada == false) {
                    $registrosFallidos[] = $datosExtraidos[0];
                }
            }
        }
        $status = true;
        unlink($rutaDeHoja);

        if (!$registrosFallidos) {
            $response = ["status" => $status, "message" => "Todas las entradas de usuarios fueron registradas."];
            echo json_encode($response);
        }
        else {
            $response = ["status" => $status, "message" => "Algunas entradas no fueron registradas.", "failedEntries" => $registrosFallidos];
            echo json_encode($response);
        }
    }
    else {
        $response = ["status" => $status, "message" => "Error al subir la hoja de cálculo."];
        echo json_encode($response);
        exit();
    }
}
else {
    $response = ["status" => $status, "message" => "Solo se permiten hojas de cálculo en formato Xlsx o Xls."];
    echo json_encode($response);
    exit();
}

function registrar($datosExtraidos) {
    /*
    $name = strip_tags($_POST["nombre"]);
    $lastName = strip_tags($_POST["apellido"]);
    
    $phone = strip_tags($_POST["telefono"]);
    $phone = str_replace(' ', '', $phone);
    $phone = str_replace('-', '', $phone);
    $phone = strval($phone);
    $email = strip_tags($_POST["correo"]);
    
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $password = strip_tags($_POST["contra"]);
    $password2 = strip_tags($_POST["conContra"]);
    */
    $data = array(
        'name' => $datosExtraidos[0],
        'lastName' => $datosExtraidos[1],
        'phone' => strval($datosExtraidos[2]),
        'email' => $datosExtraidos[3],
        'password' => $datosExtraidos[4],
    );
    $url = EndPoints::$apiUrl . EndPoints::$registrarUsuario;

    include "../../../Practica_3/scripts/php/shared/curl_opts/post_opt.php";

    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
        return false;
    }
    else {
        // Validar si se obtuvo una excepción de parte de la API.
        if (isset($response->errors)) {
            return false;
        }
    }
    curl_close($ch);
    return true;
}
