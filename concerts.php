<?php
    function executeRESTCall(string $method, string $url, string $body)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

        $header = [];
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: averylongauthkey';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        return curl_exec($curl);
    }

    $baseUrl = 'https://api.speedadmin.dk/v1/%s';

    // Fetch concert using the API, BookingTypeId 9 link to concerts
    $concertsJSONString = executeRESTCall('POST', sprintf($baseUrl, 'bookings'), '{ "BookingTypeIds": [9] }');

    // Convert JSON string to Object
    $concerts = json_decode($concertsJSONString);

    // Use var_dump($concerts); to printing all concerts, then you can see what values you have in there
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table,
        td,
        th {
            border: 1px solid;
        }
        table {
            border-collapse: collapse;
        }
        td,
        th {
            padding: .5rem;
        }
    </style>

    <title>Concert list</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Concert title</th>
                <th>Teacher name</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php foreach (array_reverse($concerts->Results) as $concert) { ?>
            <tr>
                <td><?php echo $concert->Title; ?></td>
                <td><?php echo $concert->TeacherName; ?></td>
                <td><?php
                    $datetime = new DateTime($concert->StartDate);
                    echo $datetime->format('Y-m-d');
                ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
