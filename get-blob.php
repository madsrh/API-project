<?php

// Enable error display
// ini_set("display_errors", 1);
// ini_set("track_errors", 1);
// ini_set("html_errors", 1);
// error_reporting(E_ALL);

require_once('lib/executeRESTCall.php');

echo executeRESTCall('GET', sprintf('/blobs/%s', $_GET['id']));
