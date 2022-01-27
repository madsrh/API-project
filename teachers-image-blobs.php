<?php

require_once(__DIR__.'/lib/executeRESTCall.php');

// executeRESTCall('GET', 'https://api.speedadmin.dk/v1/teachers/496');
$teachersJSONString = executeRESTCall('GET', '/teachers');

// Convert JSON string to Object and returns an array
$teachers = json_decode($teachersJSONString);

// Use a foreach loop to grab the each individual teachers
foreach($teachers as $teacher) {
  if (null !== $teacher->Blob->BlobId) {
    echo sprintf("<img src='./get-blob.php?id=%s' height='120px' loading='lazy'><br>", $teacher->Blob->BlobId);
  }
}
