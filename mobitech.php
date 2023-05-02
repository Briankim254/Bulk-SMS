<?php
// start session
session_start();

$mobile = $_POST['number'];
$message = $_POST['message'];

// Create JSON request body
$request_body = json_encode(array(
    'mobile' => $mobile,
    'response_type' => 'json',
    'sender_name' => '23107',
    'service_id' => 0,
    'message' => $message
));

# PHP example
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 15,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>$request_body,
CURLOPT_HTTPHEADER => array(
'h_api_key:17bea04e73ea2687044b9415b988c60b534ee2cf2fd97a62db4cbea56fc28b04',
'Content-Type: application/json'
),
));

$response = curl_exec($curl);

curl_close($curl);
$_SESSION['success'] = "success";
//    redirect to index.php
header('location: index.php');