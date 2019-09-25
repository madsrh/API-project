


<table>
<?php
    function executeRESTCall($method, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: xf33dgd5Y1kZbpHfRxZUxqlqwJaZJWCkQKkjiOi2pZwA1shPkIBgjkodqBngeQu2';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }
    $baseUrl = 'https://api.speedadmin.dk/v1/';

    $teachersJSONString = executeRESTCall('GET', $baseUrl . 'teachers');
    // $getMads = executeRESTCall('GET', 'https://api.speedadmin.dk/v1/teachers/496');


    // Convert JSON string to Object
    $teachers = json_decode($teachersJSONString);
    // Printing all teachers, then you can see what values you have in there
    // print_r($teachers);

    // Loop through Object
    foreach($teachers as $key => $value) {
        if (true) {
            echo '<tr><td>';
            echo '<img src="https://www.jammerbugtkulturskole.dk/Files/Cache.net/SpeedAdmin/Teacher_'. strval($value->TeacherId) .'.jpg" width="75px" height="98px"/>
            </td>';
            echo '<td><strong>' . ($value->Name . "\n\n") . ($value->Surname) . '</strong>';

						echo '<li>[AvailableClasses]</li>
									<li>Piano</li>
				  				<li>Guitar</li></td>';

						echo '<td> Email:' . ($value->Email . "\n\n");

            echo '<br> Tlf. ' . ($value->Mobile . "\n\n");
            echo '</td></tr>';

        }
    }

?>
</table>
