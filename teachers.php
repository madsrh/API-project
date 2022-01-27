<table width="100%">
<?php

  require_once(__DIR__.'/lib/executeRESTCall.php');

         $teachersJSONString = executeRESTCall('GET', '/teachers');
            // $getMads = executeRESTCall('GET', '/teachers/496');


            // Convert JSON string to Object
            $teachers = json_decode($teachersJSONString);


            // Use print_r($teachers); to printing all teachers, then you can see what values you have in there


            // Loop through Object
            foreach($teachers as $key => $value) {


              $external_link = "https://www.madsrosendahl.dk/a/img/Teacher_". strval($value->TeacherId) . ".jpg";
            // define a variable for the image url with the teacher ID
            if (true) {
                echo '<tr><td>';
                      if (@getimagesize($external_link)) {
                        echo '<img src="' . $external_link . '" width="75px" height="98px"/></td>';
                      } else {
                        echo '<img src="https://www.madsrosendahl.dk/a/img/Teacher_missing.jpg" width="75px" height="98px"/></td>';
                        // url to placeholder image if there's no image available with teacher ID
                      }
                          echo '<td><strong>' . ($value->Name . "\n\n") . ($value->Surname) . '</strong>';
                          echo '<ul>';

                          // There might be a better way to do this, but this works :)
                          $listemedfag = $value->AvailableClasses;
                          for ($i = 0; $i < count($listemedfag); $i++)
                            echo '<li>' . $listemedfag[$i] . '</li> ' . "\n";
                            echo '</ul>';

        						echo '<td>Email:' . ' ' . ($value->Email . "\n\n");
                    echo '<br>Tlf. ' . ' ' .($value->Mobile . "\n\n");
                    echo '</td></tr>';

            }
        }

    ?>
</table>
