
<?php
    function executeRESTCall($method, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: 8VWZ22JpVW1jbU5DcGd5QTNGLzNleUFPRFZ2aG5DYTFzYWR0ejFPR';

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

             // creates a filename with the teacher ID
             $unikfilename = "images/Teacher_". strval($value->TeacherId) . ".jpg";

             // saves the get_included_files
             file_put_contents( $unikfilename, $blobJSONString);

             echo 'All images have been saved!';

            }

?>
