<?php
$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
$credentials = base64_encode('4Z2KeC3RKZleZGq4cO92kI0Bv7RYxETu:GMorZPGIyRA8CMO5');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curl_response = curl_exec($curl);

echo json_decode($curl_response);





$publicKey = "PATH_TO_CERTICATE_FILE";
$plaintext = "42d247c7e979f2a06aeb16a5d0afbc5fe89a38e0a821fb08f65cda0dd53bf040";

openssl_public_encrypt($plaintext, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);

echo base64_encode($encrypted);


?>