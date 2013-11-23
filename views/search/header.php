<!DOCTYPE html>
<html lang="is">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Kvikmyndaleit</title>

    <script src="js/search.js"></script>
    <script src="jquery/jquery.min.js"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/allPages.css" rel="stylesheet">

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
          <li><a href="./index.php">Heim</a></li>
          <li class="active"><a href="./search.php">Leit</a></li>
          <li><a href="./movies.php">Kvikmyndahús</a></li>
          <li><a href="./myMovies.php">Myndir</a></li>
          <li><a href="./signup.php">Skráning</a></li>
        </ul>
        <h3 class="text-muted">Kvikmyndavefurinn</h3>
      </div>
      <h3 class="text-muted">Settu inn upplýsingar um kvikmynd hér og smelltu svo á sækja</h3>
      <form action="php/get_results.php" method="get" id="search" class="navbar-form navbar-left" role="search">

        <label for="title" class="text-muted">Titill: </label>
        <input id="title" name="title" type="text" class="form-control" placeholder="The Hobbit">

        <label for="year" class="text-muted">Ár: </label>
        <input id="year" name="year" type="text" class="form-control" placeholder="2013">


        <button type="submit" class="btn btn-default">Sækja</button>
 
      </form>
      <h3 class="text-muted">Leitarniðurstöður:</h3>