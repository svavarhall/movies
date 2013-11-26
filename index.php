<!DOCTYPE html>
<html lang="is">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Kvikmyndavefurinn</title>
    <script src="jquery/jquery.min.js"></script>
    <script src="jquery/jquery.cookie.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/allPages.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

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
          <li class="active"><a href="#">Heim</a></li>
          <li><a href="search.php">Leit</a></li>
          <li><a href="movies.php">Kvikmyndahús</a></li>
          <li><a href="myMovies.php">Mínar myndir</a></li>
          <li><a href="signup.php">Skráning</a></li>
        </ul>
        <h3 class="text-muted">Kvikmyndavefurinn</h3>
      </div>

      <div class="jumbotron">
        <h1>Allt um bíómyndir</h1>
        <p class="lead">fylgstu með nýjustu myndunum í bíó, skráðu þær myndir sem þú
          ert búinn að sjá og notaðu leitina okkar</p>
        <p><a class="btn btn-lg btn-primary" href="./signup.php" role="button">Póstlisti</a></p>
      </div>
      <div class="text-center">
        <h3 class="text-muted">Væntanlegt í bíó</h3>
      </div>
      
      <div id="results" class="row marketing">
      </div>

      <div class="footer">
        <p>&copy; Sigurður Karlsson, Svavar Árni Halldórsson</p>
      </div>

    </div> <!-- /container -->

    <script src="js/main.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>