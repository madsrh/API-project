<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once(__DIR__ . '/API/lib/executeRESTCall.php');

$foundTypes = [];

for ($i = 1; $i <= 30; $i++) {

    $body = json_encode([
        "BookingTypeIds" => [$i],
        "PublishTypeIds" => [4],
        "DateFrom" => date('Y-m-d')
    ]);

    $response = executeRESTCall('POST', '/bookings', $body);
    $decoded  = json_decode($response);

    if (
        isset($decoded->Results) &&
        count($decoded->Results) > 0
    ) {
        $foundTypes[$i] = [
            'count' => count($decoded->Results),
            'sample_title' => $decoded->Results[0]->Title ?? '(no title)'
        ];
    }
}

echo '<pre>';
if (empty($foundTypes)) {
    echo "No booking types returned results.\n";
} else {
    echo "BookingTypeIds that return data:\n\n";
    foreach ($foundTypes as $id => $info) {
        echo "ID {$id} → {$info['count']} results (e.g. \"{$info['sample_title']}\")\n";
    }
}
echo '</pre>';
