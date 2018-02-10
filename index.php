<!doctype html>
<!--php-->
<?php



?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Romain Juvigny">
  <meta name="description" content="Page accueil site officiel de legion Corp.">
  <meta name="keywords" content="legion, corp">
  <title>Legion Corp.</title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">

  <!-- font -->
  <link rel="icon" type="image/png" href="img/faviconMain.ico" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />

  <!-- script -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

</head>

<!-- accueil du site -->
<body>
  <!-- header -->
  <header class="container-fluid header">
    <div class="container">
      <a class="logo" href="index.php">Légion Corp.</a>
    </div>
    <nav class="menu">
      <a href="connexion.php">Accueil</a>
      <a href="faction.php">Les factions</a>
      <a href="zzz.html">à propos</a>
    </nav>
  </header>
  <!-- end header -->

  <!-- banner -->
  <section class="container-fluid banner">
    <div class="ban">
    </div>
    <div class="inner-banner">
      <h1>Bienvenue sur le site de Légion Corp.</h1>
      <a class="btn btn-custom" href="inscription.php">Nous rejoindre</a>
    </div>
  </section>
  <!-- end banner -->

  <!-- about -->
  <div class="container about">
    <div class="row">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="http://via.placeholder.com/950x500" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Titre 1</h5>
              <p>Description du premier slider</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://via.placeholder.com/950x500" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://via.placeholder.com/950x500" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev btn-slide-1" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next btn-slide-2" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <p class="about-phone">
    Ouvre ce site sur un ordinateur pour voir les articles à la une !
  </p>
  <!-- end about -->

  <!-- footer/join -->
  <footer class="container-fluid footer">
    <div class="container">
      <div class="row discord">
        <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
          <iframe  src="https://discordapp.com/widget?id=323540196551557122&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" class></iframe>
        </article>
        <article class="article-discord col-md-6 col-lg-6 col-xs-12 col-sm-12">
          <div class="container">
            <h1>
              Rejoins le discord !
            </h1>
            <p>
              Rejoins notre discord pour être informer le plus rapidement possible des nouveautés, jouer avec la communauté, participer aux événements et à la "vie" du serveur !
            </p>
          </div>
          <div class="container">
            <div class="btn-group">
              <button type="button" class="btn btn-custom-header-secret dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                (-_(-_-)_-)
              </button>
              <div class="dropdown-menu div-custom-header-secret">
                <a class="dropdown-item a-custom-header-secret" href="zzz.html">ZZZ.HTML.1</a>
                <a class="dropdown-item a-custom-header-secret" href="zzz.php">ZZZ.PHP.2</a>
                <a class="dropdown-item a-custom-header-secret" href="http://gifctrl.com/">NOPE.8</a>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </footer>
  <!-- end footer/join -->

  <!-- script -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
