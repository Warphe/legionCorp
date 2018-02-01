<!DOCTYPE html>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=legioncorp', 'root', '');

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
    <title>profil</title>

    <!-- css -->
    <link rel="stylesheet" href="../legionCorp/css/bootstrap.min.css">
    <link rel="stylesheet" href="../legionCorp/css/main.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="/legionCorp/js/bootstrap.min.js"></script>
    <script src="/legionCorp/js/bootstrap.bundle.min.js"></script>

  </head>
  <body>
    <h2>profil de <?php echo $userinfo['membre_pseudo']; ?></h2>
    <br/>
    Pseudo = <?php echo $userinfo['membre_pseudo'] ?>
    <br/>
    Email = <?php echo $userinfo['membre_email'] ?>
    <br>
    <?php
    if(isset($_SESSION['membre_id']) AND $userinfo['membre_id'] == $_SESSION['membre_id'])
    {
      ?>
      <a href="profil_edition.php">Editer mon profil</a>
      <a href="deconnexion.php">Deconnexion</a>
      <?php
    }
    ?>
  </body>
  </html>
  <?php
}
else {
  echo "pas de profils";
}
?>
