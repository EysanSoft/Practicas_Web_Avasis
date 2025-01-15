<?php
include "shared/endpoints.php";
$id = $_POST["userID"];
$status = false;
// Directamente se puede concatenar la id para la peticion DELETE.
$url = EndPoints::$apiUrl . EndPoints::$eliminarUsuario . $id;

include "shared/curl_opts/delete_opt.php";

if (curl_errno($ch)) {
    throw new Exception(curl_error($ch));
    $response = ["status" => $status, "message" => "Ha ocurrido un error con el servidor, intentelo más tarde."];
    echo json_encode($response);
} 
else {
    $status = true;
    $response = ["status" => $status, "message" => "Usuario eliminado."];
    echo json_encode($response);
}
curl_close($ch);
?>
