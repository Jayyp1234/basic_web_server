<?php

// Get visitor name from query parameter
$visitor_name = isset($_GET['visitor_name']) ? $_GET['visitor_name'] : 'Guest';

// Get client IP address
$client_ip = $_SERVER['REMOTE_ADDR'];

// Use a third-party API to get location data based on IP
$location_data = json_decode(file_get_contents("http://ip-api.com/json/{$client_ip}"));
$city = $location_data->city;
$temperature = 11; // You can use a weather API to get real-time temperature if needed

// Create response array
$response = [
    "client_ip" => $client_ip,
    "location" => $city,
    "greeting" => "Hello, $visitor_name!, the temperature is $temperature degrees Celsius in $city"
];

// Set header to JSON
header('Content-Type: application/json');

// Output response in JSON format
echo json_encode($response);

?>
