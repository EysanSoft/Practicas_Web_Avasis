<?php
include "shared/endpoints.php";
include "correo.php";

$id = $_POST["hiddenIdUser"];
$name = strip_tags($_POST["nombre"]);
$lastName = strip_tags($_POST["apellido"]);
// Validar telefono.
$phone = strip_tags($_POST["telefono"]);
$phone = str_replace(' ', '', $phone);
$phone = str_replace('-', '', $phone);
$phone = strval($phone);
$email = strip_tags($_POST["correo"]);
$status = false;

if (empty(trim($name)) !== true && empty(trim($lastName)) !== true && empty(trim($phone)) !== true && empty(trim($email)) !== true) {
    $data = array(
        'userId' => $id,
        'name' => $name,
        'lastName' => $lastName,
        'phone' => $phone,
        'email' => $email,
    );
    $url = EndPoints::$apiUrl . EndPoints::$editarUsuario;

    include "shared/curl_opts/put_opt.php";

    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
        $response = ["status" => $status, "message" => "Ha ocurrido un error con el servidor, intentelo más tarde."];
        echo json_encode($response);
    } else {
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
        $correo->enviarCorreo(
            $email,
            'Datos de usuario actualizados.',
            $cuerpoCorreo,
            'Tus datos fueron actualizados correctamente, veras los cambios reflejados en unos 5 minutos.'
        );
        $response = json_decode($response);

        // Validar si se obtuvo una excepción de parte de la API.
        if (isset($response->errors)) {
            $status = false;
            if (isset($response->errors->Email[0])) {
                $message = $response->errors->Email[0];
            } 
            elseif (isset($response->errors->Phone[0])) {
                $message = $response->errors->Phone[0];
            }
            elseif (isset($response->errors->Name[0])) {
                $message = $response->errors->Name[0];
            }
            elseif (isset($response->errors->LastName[0])) {
                $message = $response->errors->LastName[0];
            }
            else {
                $message = "Ha ocurrido un error con el servidor, intentelo más tarde.";
            }
            $customResponse = ["status" => $status, "message" => $message];
            echo json_encode($customResponse);
        }
        else {
            $customResponse = ["status" => $status, "message" => "Tus datos personales fueron actualizados."];
            echo json_encode($customResponse);
        }
    }
    curl_close($ch);
} else {
    $response = ["status" => $status, "message" => "Uno o más campos están vacíos"];
    echo json_encode($response);
    exit();
}
