<?php
    function executeRESTCall($method, $url, $params=null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        if($method=='POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        }
        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: xf33dgd5Y1kZbpHfRxZUxqlqwJaZJWCkQKkjiOi2pZwA1shPkIBgjkodqBngeQu2';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }

    $baseUrl = 'https://api.speedadmin.dk/v1/';

    $teachersJSONString = executeRESTCall('GET', $baseUrl . 'teachers');
    $teachers = json_decode($teachersJSONString);

    // create a filter for your result
    $params = '{
        "BookingTypeIds": [
          1,
          2
        ],
        "PublishTypeIds": [
          1,
          2
        ],
        "RoomIds": [
          1,
          2
        ],
        "BookingId": 1,
        "DateFrom": "2019-09-13T15:21:08.8820378+02:00",
        "TeacherName": "sample string 1",
        "Take": 2,
        "Skip": 3,

      }';
    $bookingsJSONString = executeRESTCall('POST', $baseUrl . 'teachers', $params);
    $bookings = json_decode($bookingsJSONString);

    print_r($bookings);

    // Loop through Object
    // foreach($teachers as $key => $value) {
    //     if (true) {
    //         echo($value->TeacherId . "\n\n");
    //         echo($value->Name . "\n\n");
    //         echo($value->Surname . "\n\n");

    //         echo '
    //         <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    //         <html>
    //         <img src="https://www.jammerbugtkulturskole.dk/Files/Cache.net/SpeedAdmin/Teacher_'. strval($value->TeacherId) .'.jpg" />

    //         </html>
    //         ';
    //     }
    // }


?>
