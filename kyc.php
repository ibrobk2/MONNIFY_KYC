<?php

// Your Monnify API credentials
$api_key = 'MK_PROD_TTUMX5T7CT';
$secret_key = 'H2V7WPHMH6U2Y7YS517DG3ZDHHJ3FKPD';

// Your Monnify API URL
$url = 'https://api.monnify.com/api/v1/bank-transfer/reserved-accounts/update-customer-bvn//56416';

// Data to be sent in the request
$data = array(
    'bvn' => '22306558799',
    'nin' => ''
);

// Convert data to JSON format
$data_string = json_encode($data);

// Prepare authorization token
$token = base64_encode("$api_key:$secret_key");

// Set up cURL options
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string),
    'Authorization: bearer TUtfUFJPRF9UVFVNWDVUN0NUOkgyVjdXUEhNSDZVMlk3WVM1MTdERzNaREhISjNGS1BE' // Include the authorization header
));

// Execute the cURL request
$result = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Display the result
echo $result;

?>
