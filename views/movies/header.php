<!doctype html>
<html lang="is">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>Sýningartímar</title>
        
        
        <script src="jquery/jquery-ui-1.10.3/jquery-1.9.1.js"></script>
        <script src="jquery/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
        <script src="js/movies.js"></script>
        

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="css/movies.css" rel="stylesheet">
        <link rel="stylesheet" href="jquery/jquery-ui-1.10.3/themes/base/jquery-ui.css" />
        <!-- Custom styles for this template -->
        <link href="css/jumbotron-narrow.css" rel="stylesheet">


        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        </head>
    <body>
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li ><a href="./index.php">Heim</a></li>
                    <li><a href="./search.php">Leit</a></li>
                    <li class="active"><a href="./movies.php">Kvikmyndahús</a></li>
                    <li><a href="#">Myndir</a></li>
                    <li><a href="./signup.php">Skráning</a></li>
                </ul>
                <h3 class="text-muted">Kvikmyndavefurinn</h3>
        </div>
        <div class="wrapper">
            <h1>Sýningartímar Kvikmyndahúsa</h1>
            <p id="range">
                <label for="time-range">Tímabil:</label>
                <input type="text" id="time-range" />
            </p>
                <div id="slider-range"></div>
            
            <br>


