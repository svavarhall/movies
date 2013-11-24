<?php

    header('Content-Type: text/html; charset=utf-8');

    require('php/signup.class.php');

    // $_SERVER superglobal inniheldur upplýsingar um request, viljum vita um HTTP aðferð
    $method = $_SERVER['REQUEST_METHOD'];

    $db = new PDO('sqlite:postlist.db');

    $signup = new Signup();
    
    if ($method === 'POST')
    {
        $signup->populate($_POST);

        if ($signup->valid())
        {
            $insert = $db->prepare("INSERT INTO postlist (email) VALUES(:email)");
            if (!$insert->execute($signup->insert()))
            {
                echo 'Netfang hefur nú þegar verið skráð! '.$db->errorInfo();
            }
            else
            {
                header('Location: signup.php?success=true'); 
            }
        }
    }
    $selected_user = 0;
    if (isset($_GET['signup']) && is_numeric($_GET['signup']))
    {
        $selected_user = $_GET['signup'];
    }

    /** hér fyrir neðan búum við til síðuna úr nokkrum view-um **/

    // höfum alltaf hausinn og formið aðgengilegt
    include('views/signup/header.php');
    
    // loka síðu
    include('views/signup/footer.php');
?> 
