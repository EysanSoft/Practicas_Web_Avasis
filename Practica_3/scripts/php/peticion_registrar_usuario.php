<?php
include "correo.php";
$name = $_POST["nombre"];
$lastName = $_POST["apellido"];
$phone = $_POST["telefono"];
$phone = strval( $phone );
$email = $_POST["correo"];
$password = $_POST["contra"];
$password2 = $_POST["conContra"];
$status = false;

if(empty(trim($name)) !== true && empty(trim($lastName)) !== true && empty(trim($phone)) !== true && empty(trim($email)) !== true && empty(trim($password)) !== true && empty(trim($password2)) !== true) {
    if($password != $password2) {
        echo json_encode($status);
        exit();
    }
    else {
        $data = array(
            'name' => $name,
            'lastName' => $lastName,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
        );
        $json_data = json_encode($data);
        $url = 'https://pruebas.avasisservices.com/user/create';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
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
        }
        else {
            $status = true;
            $correo = new Correo();
            $res = $correo->enviarCorreo($email, 'Registro de Usuario', 'Te has registrado correctamente en nuestra plataforma.');
            $response = ["status" => $status, "message" => $res];
            echo json_encode($response);
        }
        curl_close($ch);
    }
}
else {
    $response = ["status" => $status, "message" => "Uno o más campos están vacíos"];
    echo json_encode($response);
    exit();
}
?>
