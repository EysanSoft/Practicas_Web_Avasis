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
        $reader->setReadEmptyCells(false);
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
            if($datosExtraidos[0] != "NOMBRE" && $datosExtraidos[0] != "undefined" && $datosExtraidos[0] != null) {
                $entradaRegistrada = registrar($datosExtraidos);
                if ($entradaRegistrada == false) {
                    $registrosFallidos[] = $datosExtraidos[0];
                }
            }
        }
        $status = true;
        unlink($rutaDeHoja);

        if (!$registrosFallidos) {
            $response = ["status" => $status, "message" => "Todas las entradas de usuario fueron registradas."];
            echo json_encode($response);
        }
        else {
            $response = ["status" => $status, "message" => "Algunas entradas de usuario fueron rechazadas debido a la falta de campos o requisitos, estos fueron:", "failedEntries" => $registrosFallidos];
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
    $nombre = strip_tags($datosExtraidos[0]);
    $apellido = strip_tags($datosExtraidos[1]);
    // Eliminar espacios y guiones del numero telefónico.
    $telefono = strip_tags($datosExtraidos[2]);
    $telefono = str_replace(' ', '', $telefono);
    $telefono = str_replace('-', '', $telefono);
    $telefono = strval($telefono);
    $correo = strip_tags($datosExtraidos[3]);
    // Expresión regular para validar la contraseña.
    $expRegCon = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $contra = strip_tags($datosExtraidos[4]);

    if (empty(trim($nombre)) !== true && empty(trim($apellido)) !== true && empty(trim($telefono)) !== true && empty(trim($correo)) !== true && empty(trim($contra)) !== true) {
        if (preg_match($expRegCon, $contra) == 1) {
            $data = array(
                'name' => $nombre,
                'lastName' => $apellido,
                'phone' => strval($telefono),
                'email' => $correo,
                'password' => $contra,
            );
            $url = EndPoints::$apiUrl . EndPoints::$registrarUsuario;
        
            include "../../../Practica_3/scripts/php/shared/curl_opts/post_opt.php";
        
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch));
                curl_close($ch);
                return false;
            }
            else {
                $response = json_decode($response);
    
                // Validar si se obtuvo una excepción de parte de la API.
                if (isset($response->errors)) {
                    curl_close($ch);
                    return false;
                }
                else {
                    curl_close($ch);
                    return true;
                }
            }
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}
