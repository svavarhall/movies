<?php

    header('Content-Type: text/html; charset=utf-8');

    /** hér fyrir neðan búum við til síðuna úr nokkrum view-um **/

    // höfum alltaf hausinn og formið aðgengilegt
    include('views/movies/header.php');
  
    require('php/get_movies.php');
    
    // loka síðu
    include('views/movies/footer.php');
?> 
