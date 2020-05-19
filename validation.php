<?php 
header("Content-Type:application/json");
$data = file_get_contents('php://input');//capturing the mpesa validation request

$value = json_decode($data, true);
$Amount = $value['TransAmount'];//extracting amount from the validation request


if ($Amount == 900) {//validating amount then responding to mpesa validation request. If amount is correct respond with ResultCode: 0
    echo '{"ResultCode":0,
    "ResultDesc":"Success"
}';
} else {  //otherwise if amount is invalid respond with ResultCode 1 to cancel transaction
    echo '{"ResultCode":1,
    "ResultDesc":"Rejected"
}';
}


?>