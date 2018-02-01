<!DOCTYPE html>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=legioncorp', 'root', '');

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
  <title>Connexion</title>

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
  <h2>Connexion</h2>
  <form class="" action="" method="post">
    <input type="text" name="membre_pseudo_connect" value="" placeholder="pseudo">
    <input type="password" name="membre_mdp_connect" value="" placeholder="mot de passe">
    <input type="submit" name="form_connexion" value="Se connecter">
  </form>
  <?php
  if(isset($error))
  {
    echo $error;
    ?>
    <p>pas encore de compte ? <a href="inscription.php">Clique ici</a> pour t'inscrire !</p>
    <?php
  }
  ?>
</body>
</html>
