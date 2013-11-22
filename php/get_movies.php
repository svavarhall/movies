<?php    
    
    if (!apc_fetch('movies')) {
        // JSON URL which should be requested
        // $json_url = 'http://apis.is/cinema';
        $json_url = 'debug/cinema.debug.json';
        
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
    
    $result = file_get_contents('debug/cinema.debug.json');
    $data = json_decode($result);
    
    /*
    foreach($data->results as $movie) {
        echo '<div class="row">';
        echo '<div class="col-sm-6 col-md-4">';
        echo '<div class="thumbnail">';
        echo '<img src=" ' . $movie->image . ' " alt="movie poster" width="200">';
        echo      '<div class="caption">';
        echo        '<h3>' . $movie->title . '</h3>';
        echo       '<p>'. $movie->released . '</p>';
        echo       '<p>'. $movie->restricted . '</p>';
        echo       '<p>'. $movie->imdb . '</p>';
        echo       '<p>'. $movie->released . '</p>';

        foreach($movie->showtimes as $showtimes) {
             echo '<p>'. $showtimes->theater . '</p>';

             foreach($showtimes->schedule as $time) {
                $strTime = substr($time, 0, 5);
                echo '<span data-startTime="' . $strTime . '" class="label label-default">'. $time .'</span>';
                if (!in_array($strTime, $times)) {
                   array_push($times, $strTime);
                }
            }
        }
        echo '</div></div></div></div>';
    } */



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
                echo '<div class="time" data-startTime="' . $strTime . '">' . $time . '</div>';
                if (!in_array($strTime, $times)) {
                   array_push($times, $strTime);
                }
            }
        }

    echo '</table>';
    }
?>


