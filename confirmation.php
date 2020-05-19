<?php 
header("Content-Type:application/json");
$data = file_get_contents('php://input');//capturing the mpesa confirmation response

file_put_contents('log.txt', $data);//writing the mpesa confirmation content to a file
$value = json_decode($data, true);
$Amount = $value['TransAmount'];//extracting amount from the content

echo '{"ResultCode":0,
    "ResultDesc":"Success"
}';



?>