<?php
include "correo.php";
$id = $_POST["hiddenIdUser"];
$name = $_POST["nombre"];
$lastName = $_POST["apellido"];
$phone = $_POST["telefono"];
$phone = strval( $phone );
$email = $_POST["correo"];
$status = false;

if(empty(trim($name)) !== true && empty(trim($lastName)) !== true && empty(trim($phone)) !== true && empty(trim($email)) !== true) {
    $data = array(
        'userId' => $id,
        'name' => $name,
        'lastName' => $lastName,
        'phone' => $phone,
        'email' => $email,
    );
    $json_data = json_encode($data);
    $url = 'https://pruebas.avasisservices.com/user/edit/';
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
        $response = ["status" => $status, "message" => "Se actualizaron los datos con exito!"];
        echo json_encode($response);
    }
    curl_close($ch);
}
else {
    $response = ["status" => $status, "message" => "Uno o más campos están vacíos"];
    echo json_encode($response);
    exit();
}
?>
