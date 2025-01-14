<?php
include "correo.php";
$id = $_POST["hiddenIdUser"];
$name = $_POST["nombre"];
$lastName = $_POST["apellido"];
$phone = $_POST["telefono"];
$phone = strval($phone);
$email = $_POST["correo"];
$status = false;

if (empty(trim($name)) !== true && empty(trim($lastName)) !== true && empty(trim($phone)) !== true && empty(trim($email)) !== true) {
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
        $correo = new Correo();
        $cuerpoCorreo = "
                        <p><b>$name</b>, tus datos fueron actualizados correctamente. Prueba</p><br>
                        <p>Tendras que esperar <b style='background-color: yellow;'>5 minutos</b> para ver tus cambios.</p><hr>
                        <h1 style='color:red; text-align:center;'>¡Atención!</h1>
                        <div style='border: 5px ridge #f00; padding: 0.5rem;'>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus natus nemo cupiditate vel nesciunt.
                            Maiores voluptates ex accusamus eius veniam. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus natus nemo cupiditate vel nesciunt.</p><br>
                            <p>Maiores voluptates ex accusamus eius veniam.</p>
                        </div>
                        ";
        $correo -> enviarCorreo(
            $email,
            'Datos de usuario actualizados.',
            $cuerpoCorreo,
            'Tus datos fueron actualizados correctamente, veras los cambios reflejados en unos 5 minutos.'
        );
        // Problema logico...
        if(isset($response -> errors[0])) {
            echo json_encode($response);
        }
        else {
            $response = ["status" => $status, "message" => "Tus datos personales fueron actualizados."];
            echo json_encode($response);
        }
    }
    curl_close($ch);
}
else {
    $response = ["status" => $status, "message" => "Uno o más campos están vacíos"];
    echo json_encode($response);
    exit();
}
