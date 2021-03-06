<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<h2>NEWS</h2>
<?php
    function executeRESTCall($method, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: xf33dgd5Y1kZbpHfRxZUxqlqwJaZJWCkQKkjiOi2pZwA1shPkIBgjkodqBngeQu2';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }
    $baseUrl = 'https://api.speedadmin.dk/v1/';

    $newsJSONString = executeRESTCall('GET', $baseUrl . 'news');

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
