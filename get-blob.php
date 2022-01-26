<?php

// Enable error display
// ini_set("display_errors", 1);
// ini_set("track_errors", 1);
// ini_set("html_errors", 1);
// error_reporting(E_ALL);

function executeRESTCall($method, $url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

    $header = array();
    $header[] = 'Content-type: application/json';
    $header[] = 'Authorization: averylongauthkey'; // Add you own authorization key

    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
}

$baseUrl = 'https://api.speedadmin.dk/v1/%s';

echo executeRESTCall('GET', sprintf($baseUrl, 'blobs/'.$_GET['id']));
