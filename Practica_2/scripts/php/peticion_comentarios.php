<?php
// Variable obtenida por el POST de ajax.
$indexID = $_POST['postID'];	
$url = "https://jsonplaceholder.typicode.com/posts/". $indexID ."/comments";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
curl_close($ch);

//$tablePosts = json_encode($response);
echo $response;
?>
