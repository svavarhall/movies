<!DOCTYPE html>
<html lang="is">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Skráning</title>

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
          <li><a href="./search.php">Leit</a></li>
          <li><a href="./movies.php">Kvikmyndahús</a></li>
          <li><a href="./myMovies.php">Mínar myndir</a></li>
          <li class="active"><a href="./signup.php">Skráning</a></li>
        </ul>
        <h3 class="text-muted">Kvikmyndavefurinn</h3>
      </div>
      <div class="center-text">
        <h3 class="text-muted">Skráðu þig á póstlista Kvikmyndavefsins</h3>
      </div>
       
      <?php if (sizeof($signup->errors()) > 0): ?>
      <div class="errors">
          <?php foreach ($signup->errors() as $error): ?>
          <div class="alert alert-danger"><?php echo $error->error; ?></div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      
      <form class="navbar-form navbar-left" method="post"
      action="signup.php">

        <label for="email" class="text-muted">Netfang: </label>
        <input id="email" name="email" type="text" class="form-control" placeholder="notandi@simafyrirtaeki.is">

        <button type="submit" class="btn btn-default" name="submit">Skrá</button>
 
      </form>
      <h3 class="text-muted"></h3>