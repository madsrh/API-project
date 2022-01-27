<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>


<?php
    require_once(__DIR__.'/lib/executeRESTCall.php');

    $coursesJSONString = executeRESTCall('GET', '/courses' );

    // Convert JSON string to Object
    $courses = json_decode($coursesJSONString);



    foreach($courses as $key => $value) {

  if  ($value->CouseId == "368") {

     echo '<p>' . strval($key) . ' = CouseId ' . strval($value->CouseId) . ' | Name = ' . strval($value->Course) . '</p>';

                                 // jammerbugt.speedadmin.dk/tilmelding%3F%23/Course/368/
           // What we want: https://jammerbugt.speedadmin.dk/tilmelding#/Course/368/127
        echo '<form method = "get" action="http://jammerbugt.speedadmin.dk/tilmelding%23/Course/368/' . $value->SubCategories[$i]->SubCategoryID . '">';
        echo '<select>';
        echo '<option selected="selected">Choose one</option>';

        for ($i=0; $i < sizeof($value->SubCategories); $i++) {

            echo '<option value="' . $value->SubCategories[$i]->SubCategoryID .'">' . $value->SubCategories[$i]->Name. '</option>';

        }
        echo '<input type="submit" value="Submit">';
        echo '</select>';
        echo '</form>';

      }

    }


?>
</html>
