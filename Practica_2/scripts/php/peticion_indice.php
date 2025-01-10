<?php
$url = "https://jsonplaceholder.typicode.com/posts";
$ch = curl_init($url);

// Operaciones basicas para un cURL GET.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
curl_close($ch);
$posts = json_decode($response, true);
?>
