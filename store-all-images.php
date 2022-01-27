
<?php

  require_once(__DIR__.'/lib/executeRESTCall.php');

          // executeRESTCall('GET', 'https://api.speedadmin.dk/v1/teachers/496');
            $teachersJSONString = executeRESTCall('GET', '/teachers');

            // Convert JSON string to Object and returns an array
            $teachers = json_decode($teachersJSONString);

            // Use a foreach loop to grab the each individual teachers blob
            foreach($teachers as $key => $value) {

             // gets the raw image data
             $blobJSONString = executeRESTCall('GET', '/blobs/' . $value->Blob->BlobId);

             // creates a filename with the teacher ID
             $unikfilename = "images/Teacher_". strval($value->TeacherId) . ".jpg";

             // saves the get_included_files
             file_put_contents( $unikfilename, $blobJSONString);

             echo 'All images have been saved!';

            }

?>
