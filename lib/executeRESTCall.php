<?php

require_once(__DIR__.'/../config/config.php');

function executeRESTCall(string $method, string $path, ?string $body = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, CONFIG['BASE_URL'] . $path);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

    $header = [];
    $header[] = 'Content-type: application/json';
    $header[] = 'Authorization: ' . CONFIG['API_KEY'];

    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    return curl_exec($curl);
}
