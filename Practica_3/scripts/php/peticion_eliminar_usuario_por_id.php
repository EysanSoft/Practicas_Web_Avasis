<?php
$id = $_POST["userID"];
$status = false;
// Directamente se puede concatenar el id para la peticion DELETE.
$url = 'https://pruebas.avasisservices.com/user/delete/' . $id;
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
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
