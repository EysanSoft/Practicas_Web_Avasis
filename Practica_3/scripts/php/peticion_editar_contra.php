<?php
include "shared/endpoints.php";
$userId = $_POST["idUser"];
$newPassword = $_POST["contra"];
$newPassword2 = $_POST["conContra"];

$status = false;
if(empty(trim($newPassword)) !== true && empty(trim($newPassword2)) !== true) {
    if($newPassword == $newPassword2) {
        $data = array(
            'userId' => $userId,
            'password' => $newPassword,
        );
        $url = EndPoints::$apiUrl . EndPoints::$editarContra;

        include "shared/curl_opts/put_opt.php";
        
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
            $response = ["status" => $status, "message" => "Ha ocurrido un error con el servidor, intentelo más tarde."];
            echo json_encode($response);
        }
        else {
            $status = true;
            $response = ["status" => $status, "message" => "Se actualizo la contraseña con exito!"];
            echo json_encode($response);
        }

        curl_close($ch);
    }
    else {
        $response = ["status" => $status, "message" => "Las contraseñas no coinciden"];
        echo json_encode($response);
        exit();
    }
    /*
    if($oldPassword == "contraseñaActual") {
    }
    else {
        $response = ["status" => $status, "message" => "Contraseña actual incorrecta"];
        echo json_encode($response);
        exit();
    }
    */
}
else {
    $response = ["status" => $status, "message" => "Uno o más campos están vacíos"];
    echo json_encode($response);
    exit();
}
?>
