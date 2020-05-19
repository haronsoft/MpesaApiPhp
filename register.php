<?php
$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
$credentials = base64_encode('4Z2KeC3RKZleZGq4cO92kI0Bv7RYxETu:GMorZPGIyRA8CMO5');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curl_response = curl_exec($curl);

$access_token = json_decode($curl_response)->access_token;

$url_register = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

//$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url_register);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token)); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'ShortCode' => '600497',
  'ResponseType' => 'Cancelled',
  'ConfirmationURL' => 'http://6b8bcd6a.ngrok.io/mpesa-test/validation.php',
  'ValidationURL' => 'http://6b8bcd6a.ngrok.io/mpesa-test/validation.php'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
//print_r($curl_response);

echo $curl_response;
?>