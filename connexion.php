<!DOCTYPE html>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=legioncorp', 'root', 'Romjuv02-');

if(isset($_POST['form_connexion']))
{
  $membre_pseudo_connect = htmlspecialchars($_POST['membre_pseudo_connect']);
  $membre_mdp_connect = sha1($_POST['membre_mdp_connect']);
  if(!empty($membre_pseudo_connect) AND !empty($membre_mdp_connect))
  {
    $requser = $bdd->prepare("SELECT * FROM membre WHERE membre_pseudo = ? AND membre_mdp = ?");
    $requser->execute(array($membre_pseudo_connect, $membre_mdp_connect));
    $userexist = $requser->rowCount();
    if($userexist == 1)
    {
      $userinfo = $requser->fetch();
      $_SESSION['membre_id'] = $userinfo['membre_id'];
      $_SESSION['membre_pseudo'] = $userinfo['membre_pseudo'];
      $_SESSION['membre_mdp'] = $userinfo['membre_mdp'];
      header("Location: profil.php?membre_id=".$_SESSION['membre_id']);
    }
    else
    {
      $error = "Mauvais pseudo ou mot de passe";
    }
  }
  else
  {
    $error = "Tout les champs doivent être complétés !";
  }
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Romain Juvigny">
  <meta name="description" content="Page de connexion site officiel de legion Corp.">
  <meta name="keywords" content="legion, corp">
  <title>Legion Corp.</title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/inscription.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <!-- script -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

</head>
<body class="text-center">
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

  <!-- connexion -->
  <form class="form-signin" action="" method="post">
    <h2 class="h3 md-3">Connexion</h2>
    <input class="form-control form-pack-top" type="text" name="membre_pseudo_connect" value="" placeholder="pseudo">
    <input class="form-control form-pack-bottom" type="password" name="membre_mdp_connect" value="" placeholder="mot de passe">
    <input class="btn btn-custom" type="submit" name="form_connexion" value="Se connecter">

    <?php
    if(isset($error))
    { ?>
      <p id="error"> <?php echo $error;?> </p>
      <p> pas encore de compte ? <a href="inscription.php">Clique ici</a> pour t'inscrire !</p>
      <?php
    }
    ?>
  </form>
    <!-- end connexion -->
</body>
</html>
