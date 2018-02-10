<!DOCTYPE html>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=legioncorp', 'root', 'Romjuv02-');

if(isset($_GET['membre_id']))
{
  $getid = intval($_GET['membre_id']);
  $requser = $bdd->prepare("SELECT * FROM membre WHERE membre_id = ?");
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
  ?>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Romain Juvigny">
    <meta name="description" content="Page de profils site officiel de legion Corp.">
    <meta name="keywords" content="legion, corp">
    <title>Legion Corp.</title>

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/inscription.css">

    <!-- font -->
    <link rel="icon" type="image/png" href="img/faviconMain.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </head>
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

    <!-- information -->
    <section class="container-fluid information">
      <div class="container">
        <div class="row information-edition">
          <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <h2>profil de <?php echo $userinfo['membre_pseudo']; ?></h2>
            <br/>
            <p>Pseudo = <?php echo $userinfo['membre_pseudo'] ?></p>
            <br/>
            <p>Email = <?php echo $userinfo['membre_email'] ?></p>
          </article>
          <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <br>
            <?php
            if(isset($_SESSION['membre_id']) AND $userinfo['membre_id'] == $_SESSION['membre_id'])
            {
              ?>
              <a class="btn btn-custom" href="profil_edition.php">Editer mon profil</a>
              <a class="btn btn-custom" href="deconnexion.php">Deconnexion</a>
              <?php
            }
            ?>
          </article>
        </div>
      </div>
    </section>
    <!-- end information -->

  </body>
  </html>
  <?php
}
else {
  echo "pas de profils";
}
?>
