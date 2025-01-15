<?php	
include "shared/endpoints.php";
$url = EndPoints::$apiUrl . EndPoints::$obtenerUsuario;

include "shared/curl_opts/get_opt.php";

echo $response;
?>
