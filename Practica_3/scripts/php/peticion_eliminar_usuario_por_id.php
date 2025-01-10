<?php
$id = $_POST["id"];
$status = false;
$data = array(
    'userId' => $id,
);
$json_data = json_encode($data);
$url = 'https://pruebas.avasisservices.com/user/delete/';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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
    $response = ["status" => $status, "message" => "Usuario eliminado."];
    echo json_encode($response);
}
curl_close($ch);
?>
