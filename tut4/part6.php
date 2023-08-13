<?php
require 'C:\xampp\php\vendor/autoload.php'; 

use GuzzleHttp\Client;


$client = new Client();

$response = $client->get('http://localhost/mvc/tut4/sample_xml.php');
$xmlString = $response->getBody()->getContents();
$xml = simplexml_load_string($xmlString);
$xmlArray = json_decode(json_encode($xml), true);

// Setting the content type to JSON
header('Content-Type: application/json');

echo json_encode($xmlArray, JSON_PRETTY_PRINT);
?>
