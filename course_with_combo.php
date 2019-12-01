<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>


// This page should have a dropdown combo similar to https://www.jammerbugtkulturskole.dk/undervisningstilbud/musik/musik-tilbud/musik-tilbud?ItemID=368&TreeID=41&UndervisningstilbudID=368
//
// Let's say you submit "Kun Orkester" which is SubCategoryID => int(127) then that should link to
// https://jammerbugt.speedadmin.dk/tilmelding#/Course/368/127
//

<?php
    function executeRESTCall($method, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        $header = array();
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: xf33dgd5Y1kZbpHfRxZUxqlqwJaZJWCkQKkjiOi2pZwA1shPkIBgjkodqBngeQu8';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($curl);
    }
    $baseUrl = 'https://api.speedadmin.dk/v1/';

    $coursesJSONString = executeRESTCall('GET', $baseUrl . 'courses' );

    // Convert JSON string to Object
    $courses = json_decode($coursesJSONString);

    // Loop through Object
    foreach($courses as $key => $value) {
         // Finds courseid 195
        if  ($value->CouseId == "368") {

       echo '<h1>' . $value->Text . '</h1>';
       echo $value->Description;
       echo '<hr><br>';


       // print_r($value->SubCategories);
       var_dump($value->SubCategories);




?>
<form>
    <select>
        <option selected="selected">Choose one</option>
        <?php


        // Iterating through the array
        foreach($value->SubCategories as $item){
        ?>
        <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
        <?php
        }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>
<?php



        }
    }

?>

</html>
