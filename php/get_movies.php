<?php    
    
    if (!apc_fetch('movies')) {
        // JSON URL which should be requested
         $json_url = 'http://apis.is/cinema/';
        // Initializing curl
        $ch = curl_init( $json_url );
        // Configuring curl options
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
        );
        // Setting curl options
        curl_setopt_array( $ch, $options );
        // Getting results
        $result =  curl_exec($ch); // Getting JSON result string
        $data = json_decode($result);
        apc_store('key1', $data, 600);
    } else {
        $data = apc_fetch('movies');
    }
    
    if(empty($data)) {
        echo '<div class="alert alert-danger">Því miður er þjónustan ' .
        'óvirk að svo stöddu.</div>';
    } else {

   
        $times = array();
        $id = 1;
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
                 echo '<tr><td >';

                 foreach($showtimes->schedule as $time) {
                    $strTime = substr($time, 0, 5);
                    echo '<span class="label label-default" data-startTime="' . $strTime . '">' . $time . '</span>';
                    if (!in_array($strTime, $times)) {
                       array_push($times, $strTime);
                    }
                }
            }

        echo '</table>';
        }
    }
?>


