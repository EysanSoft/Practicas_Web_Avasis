<?php
$userId = $_POST["idUser"];
// La variable quedara inutilizada por el momento...
// $oldPassword = $_POST["contraOG"];
// Falta la contraseña actual, para validar.
$newPassword = $_POST["contra"];
$newPassword2 = $_POST["conContra"];

$status = false;
if(empty(trim($newPassword)) !== true && empty(trim($newPassword2)) !== true) {
    if($newPassword == $newPassword2) {
        $data = array(
            'userId' => $userId,
            'password' => $newPassword,
        );
        $json_data = json_encode($data);
        $url = 'https://pruebas.avasisservices.com/user/edit/password';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");        
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data)
        ));
        $response = curl_exec($ch);
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
