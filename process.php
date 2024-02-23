<?php

// Your Monnify API credentials
$apiKey = "MK_PROD_TTUMX5T7CT";
$secretKey = "H2V7WPHMH6U2Y7YS517DG3ZDHHJ3FKPD";

// BVN and KYC details to update
$bvn = "22306558799"; // Sample BVN
$kycDetails = array(
    "firstName" => "Ibrahim",
    "lastName" => "Yusuf",
    "middleName" => "",
    "dateOfBirth" => "1989-04-14",
    "phoneNumber" => "08135363778",
    "email" => "ibrobk@gmail.com",
    // Add other required KYC fields as needed
);

// URL for the KYC update endpoint
$url = "https://api.monnify.com/api/v1/kyc/bvn/update";

// Prepare headers
$headers = array(
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode("$apiKey:$secretKey")
);

// Prepare payload
$data = array(
    "bvn" => $bvn,
    "kycDetails" => $kycDetails
);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)){
    echo 'Error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output response
echo $response;

?>
