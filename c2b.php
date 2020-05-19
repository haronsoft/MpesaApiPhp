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


$c2b_url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

// $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $c2b_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token)); //setting custom header


$curl_post_data = array(
          //Fill in the request parameters with valid values
    'ShortCode' => '600497',
    'CommandID' => 'CustomerPayBillOnline',
    'Amount' => '100',
    'Msisdn' => '254708374149',
    'BillRefNumber' => '00000'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>