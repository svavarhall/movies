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


   
?>

