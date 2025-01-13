<?php
$userId = $_POST["idUser"];

$nombreImagen = $_FILES["fotoDePerfil"]["name"];
$tempImagen = $_FILES["fotoDePerfil"]["tmp_name"];

$extImagen = $_FILES["fotoDePerfil"]["type"];
$extension = explode("/", $extImagen);

if($extension[1] == "png" or $extension[1] == "jpg") {
    $randomName = uniqid();
    $nombreImagen = $randomName. ".". $extension[1];

    $ruta = "../../images/$nombreImagen";
    if (move_uploaded_file($tempImagen, $ruta)) {
        echo "imagen almacenada.";
    } else {
        echo "Error al subir la imagen.";
    }
} 
else {
    echo "Solo se permiten imágenes en formato PNG, JPG";
}
/*$status = false;
if(empty(trim($nombreImagen)) !== true) {
    $data = array(
        'userId' => $userId,
        'image' => $nombreImagen,
    );
    $json_data = json_encode($data);
    $url = 'https://pruebas.avasisservices.com/user/img';
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
        $response = ["status" => $status, "message" => "¡Foto de perfil establecida!"];
        echo json_encode($response);
    }
    curl_close($ch);
}
else {
    $response = ["status" => $status, "message" => "Uno o mas campos estan vacios"];
    echo json_encode($response);
    exit();
}*/
?>
