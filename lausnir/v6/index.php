<?php

    header('Content-Type: text/html; charset=utf-8');

    // $_SERVER superglobal inniheldur upplýsingar um request, viljum vita um HTTP aðferð
    $method = $_SERVER['REQUEST_METHOD'];

    

    /** hér fyrir neðan búum við til síðuna úr nokkrum view-um **/

    // höfum alltaf hausinn og formið aðgengilegt
    include('views/header.php');
  
    require('get_json.php');
    
    // loka síðu
    include('views/footer.php');
?> 
