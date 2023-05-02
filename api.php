<?php
// start session
session_start();
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

if ($_POST['form-post'] == 'mobitech'){

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
        CURLOPT_POSTFIELDS => $request_body,
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
}
elseif ($_POST['form-post'] == 'africastalking'){
// Set your app credentials
    $username   = "briankim";
    $apiKey     = "478a0c7bb9de5c52d87927333e000db4f025e6ccbf6ca69932b3e1f9e5d8b4cf";

// Initialize the SDK
    $AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
    $sms        = $AT->sms();

// Set the numbers you want to send to in international format
    $recipients = $_POST['number'];

// Set your message
    $message    = $_POST['message'];

// Set your shortCode or senderId
    $from       = "AFRICASTKNG";

    try {
        // Thats it, hit send and we'll take care of the rest
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message,

        ]);

        print_r($result);
//    set session variable
        $_SESSION['success'] = "success";
//    redirect to index.php
        header('location: index.php');

    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
}
else{
    echo "wrong platform!";
}
