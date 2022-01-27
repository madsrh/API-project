<?php

// Enable error display
// ini_set("display_errors", 1);
// ini_set("track_errors", 1);
// ini_set("html_errors", 1);
// error_reporting(E_ALL);

require_once('lib/executeRESTCall.php');

// Return 404 error if no ID
if (null === $_GET['id']) {
    http_response_code(404);
    die();
}

echo executeRESTCall('GET', sprintf('/blobs/%s', $_GET['id']));
