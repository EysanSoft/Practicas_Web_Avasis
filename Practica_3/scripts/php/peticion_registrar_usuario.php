<?php
include "../../endpoints.php";
include "correo.php";
$name = $_POST["nombre"];
$lastName = $_POST["apellido"];
$phone = $_POST["telefono"];
$phone = strval($phone);
$email = $_POST["correo"];
$password = $_POST["contra"];
$password2 = $_POST["conContra"];
$status = false;

if (empty(trim($name)) !== true && empty(trim($lastName)) !== true && empty(trim($phone)) !== true && empty(trim($email)) !== true && empty(trim($password)) !== true && empty(trim($password2)) !== true) {
    if ($password != $password2) {
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
        $url = EndPoints::$apiUrl . EndPoints::$registrarUsuario;
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
            $response = ["status" => $status, "message" => "Ha ocurrido un error con el servidor, intentelo más tarde."];
            echo json_encode($response);
        }
        else {
            $status = true;
            $correo = new Correo();
            $cuerpoCorreo = "
                            <b>$name</b>, bienvenid@ a nuestra plataforma! <br>
                            ¡Ahora podras tener acceso a todos nuestros servicios! <br>
                            Si te suscribes a nuestra subscripción mensual, tendras acceso a: <br>
                            <ol>
                            <li>¡Descuentos Exclusivos!</li>
                            <li>¡Servicio de Correo!</li>
                            <li>¡Cambios de contraseñas ilimitadas!</li>
                            </ol>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus natus nemo cupiditate vel nesciunt. <br>
                            Maiores voluptates ex accusamus eius veniam.
                            ";
            $correo->enviarCorreo(
                $email,
                'Registro de Usuario',
                $cuerpoCorreo,
                'Te has registrado correctamente a nuestra plataforma.'
            );
            $response = json_decode($response);
            /* 
                Validar si se obtuvo de la API como respuesta la excepción del correo electronico
                excediendo los 20 caracteres.
            */
            if (isset($response->errors->Email[0])) {
                $status = false;
                $message = $response->errors->Email[0];
                $customResponse = ["status" => $status, "message" => $message];
                echo json_encode($customResponse);
            }
            else {
                $customResponse = ["status" => $status, "message" => "Has sido registrado, ¡bienvenido $name!"];
                echo json_encode($customResponse);
            }
        }
        curl_close($ch);
    }
}
else {
    $response = ["status" => $status, "message" => "Uno o más campos están vacíos"];
    echo json_encode($response);
    exit();
}
