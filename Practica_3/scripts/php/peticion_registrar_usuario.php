<?php
include "shared/endpoints.php";
include "correo.php";
$name = strip_tags($_POST["nombre"]);
$lastName = strip_tags($_POST["apellido"]);
// Validar telefono.
$phone = strip_tags($_POST["telefono"]);
$phone = str_replace(' ', '', $phone);
$phone = str_replace('-', '', $phone);
$phone = strval($phone);
$email = strip_tags($_POST["correo"]);
// Validar contraseña.
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
$password = strip_tags($_POST["contra"]);
$password2 = strip_tags($_POST["conContra"]);
$status = false;

if (empty(trim($name)) !== true && empty(trim($lastName)) !== true && empty(trim($phone)) !== true && empty(trim($email)) !== true && empty(trim($password)) !== true && empty(trim($password2)) !== true) { 
    if(preg_match($password_regex, $password) == 0) {
        $customResponse = ["status" => $status, "message" => "La contraseña no cumple con los requisitos."];
        echo json_encode($customResponse);
        exit();
    }
    if ($password != $password2) {
        $customResponse = ["status" => $status, "message" => "¡Las contraseñas no coinciden!"];
        echo json_encode($customResponse);
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
        $url = EndPoints::$apiUrl . EndPoints::$registrarUsuario;
    
        include "shared/curl_opts/post_opt.php";
    
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

            // Validar si se obtuvo una excepción de parte de la API.
            if (isset($response->errors)) {
                $status = false;
                if(isset($response->errors->Email[0])) {
                    $message = $response->errors->Email[0];
                }
                elseif(isset($response->errors->Phone[0])) {
                    $message = $response->errors->Phone[0];
                }
                elseif(isset($response->errors->Name[0])) {
                    $message = $response->errors->LastName[0];
                }
                elseif(isset($response->errors->LastName[0])) {
                    $message = $response->errors->LastName[0];
                }
                else {
                    $message = "Ha ocurrido un error con el servidor, intentelo más tarde.";
                }
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
