
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

              // saviour line! This turns the image data into an image
              echo "<img src='data:image/jpeg;base64," . base64_encode( $blobJSONString )."' width='80px' width='120px'><br>";
        }

        ?>
