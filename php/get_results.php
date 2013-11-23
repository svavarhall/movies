<?php    
    
    // you can access the values posted by jQuery.ajax
    // through the global variable $_POST, like this:
    $title = $_GET['title'];
    $json_url = 'http://mymovieapi.com/?title=' .$title. '&type=json&limit=10';
    // Initializing curl
    $ch = curl_init( $json_url );
    // Configuring curl assert_options(what)
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
    );
    // Setting curl options
    curl_setopt_array( $ch, $options );
    // Getting results
    $result =  curl_exec($ch); // Getting JSON result string

    $data = json_decode($result);
    var_dump($data);
    //foreach()


    include('views/search/header.php');

    foreach($data->results as $movie) {

        $len = 4 + count($movie->showtimes) * 2; 
        echo '<table class="movie" id="' . $id . '">';
        echo '<tr class="title"><td colspan="1">' . $movie->title . '</td>';
        echo '<td rowspan="' . $len . '"><img src=' . $movie->image . 
             ' alt="Movie poster" width="200"></td></tr>';
        echo '<tr><td >Útgáfuár: '. $movie->released . '</td></tr>';
        echo '<tr><td >Aldurstakmark ' . $movie->restricted . '</td></tr>';
        echo '<tr><td >IMDB: ' . $movie->imdb . '</td></tr>';

        $id++;
        

        foreach($movie->showtimes as $showtimes) {
             echo '<tr class="theater"><td >' . $showtimes->theater . '</td></tr>';
             //echo '<tr class="theater"><td ><span class="label label-primary">' . $showtimes->theater . '</span></td></tr>';
             echo '<tr><td >';

             foreach($showtimes->schedule as $time) {
                $strTime = substr($time, 0, 5);
                echo '<span class="label label-default" data-startTime="' . $strTime . '">' . $time . '</span>';
                //echo '<div class="time" data-startTime="' . $strTime . '">' . $time . '</div>';
                if (!in_array($strTime, $times)) {
                   array_push($times, $strTime);
                }
            }
        }

    echo '</table>';
    }
    include('views/search/footer.php');
?>

