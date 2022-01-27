<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<h2>NEWS</h2>
<?php

    require_once(__DIR__.'/lib/executeRESTCall.php');

    $newsJSONString = executeRESTCall('GET', '/news');

    // Convert JSON string to Object
    $news = json_decode($newsJSONString);
    // Printing all news, then you can see what values you have in there
    // print_r($news);

    // Loop through Object
    foreach(array_reverse($news) as $key => $value) {

        if  ($key < "15") { // View only 15 latest news
          echo '<hr>';
          echo $value->CreatedDate;
          echo '<br><strong>' . $value->Title . "\n\n" . '</strong>';
          echo'<br><p>';
          echo($value->Text . "\n\n");
          echo'</p><br>';
            
                  // checks if HasPicture is == TRUE
              if ($value->HasPicture) 
              {
                $blobimageId = executeRESTCall('GET', $baseUrl . 'blobs/' . $value->Blob->BlobId);
                echo "<img src='data:image/jpeg;base64," . base64_encode( $blobimageId )."'  width='100%'><br>";

              } // end of HasPicture if
        } // end of < 15
    } // end of foreach        
              
?>
</html>
