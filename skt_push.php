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

$stk_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

curl_setopt($curl, CURLOPT_URL, $stk_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token)); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => '174379',
  'Password' => 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTgxMjA0MTQxOTIw',
  'Timestamp' => '20181204141920',
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => 1,
  'PartyA' => '254701075090',
  'PartyB' => '174379',
  'PhoneNumber' => '254701075090',
  'CallBackURL' => 'http://6b8bcd6a.ngrok.io/mpesa-test/validation.php',
  'AccountReference' => 'Account',
  'TransactionDesc' => 'Payment'
);
$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);

echo $curl_response;
?>