
<?php
    function executeRESTCall($method, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: 3FscW4zZDJLQ2FCdXR5bjh5OEtwNm9abHVJYVZyZlpoZ25OYldXWWYvNVlV'; // Add you own authorization key

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }
        $baseUrl = 'https://api.speedadmin.dk/v1/';

          // executeRESTCall('GET', 'https://api.speedadmin.dk/v1/teachers/496');
            $teachersJSONString = executeRESTCall('GET', $baseUrl . 'teachers');

            // Convert JSON string to Object and returns an array
            $teachers = json_decode($teachersJSONString);

            // Use a foreach loop to grab the each individual teachers blob
            foreach($teachers as $key => $value) {
              // gets the raw image data
              $blobJSONString = executeRESTCall('GET', $baseUrl . 'blobs/' . $value->Blob->BlobId);

              // saviour line! This turns the image data into an image
              echo "<img src='data:image/jpeg;base64," . base64_encode( $blobJSONString )."' width='80px' width='120px'><br>";
        }

        ?>
