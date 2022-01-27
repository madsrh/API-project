<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<?php
    require_once(__DIR__.'/lib/executeRESTCall.php');

    $coursesJSONString = executeRESTCall('GET', '/courses');

    // Convert JSON string to Object
    $courses = json_decode($coursesJSONString);

    // Loop through Object
    foreach($courses as $key => $value) {
         // Finds courseid 195
        if  ($value->CouseId == "195") {
       echo '<h1>' . $value->Text . '</h1>';
       echo 'Php script array key: ' . $key . '<br>';
       echo $value->Description;
       echo '<h3>Subject:</h3>';
       echo $value->Subject;
       echo '<h3>Categori:</h3>';
       echo $value->Categori;
       echo '<h3>CouseId:</h3>';
       echo $value->CouseId;
       echo '<h3>Course:</h3>';
       echo $value->Course;
       echo '<h3>OnWaitingList:</h3>';
       echo $value->OnWaitingList;
       echo '<h3>CategoriId / TreeId:</h3>';
       echo $value->CategoriId;
       echo '<h3>SubjectCodeId:</h3>';
       echo $value->SubjectCodeId;

        }
    }

?>

</html>
