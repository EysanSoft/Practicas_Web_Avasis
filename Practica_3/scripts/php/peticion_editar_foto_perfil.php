<?php
include "../../endpoints.php";
$status = false;
$userId = $_POST["idUser"];
$currentImageName = isset($_POST["imageName"]) ? $_POST["imageName"] : "";

$nombreImagen = $_FILES["fotoDePerfil"]["name"];
$tempImagen = $_FILES["fotoDePerfil"]["tmp_name"];

$extImagen = $_FILES["fotoDePerfil"]["type"];
$extension = explode("/", $extImagen);
$currentImageRoute = "../../../resources/images/$currentImageName";
if (strlen($currentImageName) > 0 && file_exists($currentImageRoute)) {
    unlink($currentImageRoute);
}
// Valida que la extensión sea PNG, JPG o JPEG.
if ($extension[1] == "png" || $extension[1] == "jpg" || $extension[1] == "jpeg") {
    $randomName = uniqid();
    $nombreImagen = $randomName . "." . $extension[1];
    $ruta = "../../../resources/images/$nombreImagen";

    // Valida si la imagen fue almacenada a la ruta local establecida.
    if (move_uploaded_file($tempImagen, $ruta)) {
        if (empty(trim($nombreImagen)) !== true) {
            $data = array(
                'userId' => $userId,
                'image' => $nombreImagen,
            );
            $json_data = json_encode($data);
            $url = EndPoints::$apiUrl . EndPoints::$editarFotoPerfil;
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
            } else {
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
        }
    } 
    else {
        $response = ["status" => $status, "message" => "Error al subir la imagen."];
        echo json_encode($response);
    }
} 
else {
    $response = ["status" => $status, "message" => "Solo se permiten imágenes en formato PNG, JPG o JPEG."];
    echo json_encode($response);
}
