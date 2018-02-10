<!DOCTYPE html>
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=legioncorp', 'root', 'Romjuv02-');

if(isset($_SESSION['membre_id']))
{
  $requser = $bdd->prepare("SELECT * FROM membre WHERE membre_id = ?");
  $requser->execute(array($_SESSION['membre_id']));
  $userinfo = $requser->fetch();

  if(isset($_POST['newPseudo']) AND !empty($_POST['newPseudo']) AND $_POST['newPseudo'] != $userinfo['membre_pseudo'])
  {
    $newPseudo = htmlspecialchars($_POST['newPseudo']);
    $insertPseudo = $bdd->prepare("UPDATE membre SET membre_pseudo = ? WHERE membre_id = ?");
    $insertPseudo->execute(array($newPseudo, $_SESSION['membre_id']));
    header('Location: profil.php?membre_id='.$_SESSION['membre_id']);
  }
  if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $userinfo['membre_email'])
  {
    if(filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL))
    {
      $newEmail = htmlspecialchars($_POST['newEmail']);
      $insertEmail = $bdd->prepare("UPDATE membre SET membre_email = ? WHERE membre_id = ?");
      $insertEmail->execute(array($newEmail, $_SESSION['membre_id']));
      header('Location: profil.php?membre_id='.$_SESSION['membre_id']);
    }
    else {
      $error = "Ceci n'est pas un email valable";
    }
  }
  if(isset($_POST['newMdp']) AND !empty($_POST['newMdp']) AND isset($_POST['newMdp2']) AND !empty($_POST['newMdp2']))
  {
    $newMdp = sha1($_POST['newMdp']);
    $newMdp2 = sha1($_POST['newMdp2']);
    if($newMdp == $newMdp2)
    {
      $insertMdp = $bdd->prepare("UPDATE membre SET membre_mdp = ? WHERE membre_id = ?");
      $insertMdp->execute(array($newMdp, $_SESSION['membre_id']));
    }
    else {
      $error = "les deux mot de passe ne correspondent pas";
    }
  }
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

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </head>
  <body>
    <h2>Edition du profil</h2>
    <form class="" action="" method="post">
      <label for="">Changer le pseudo</label>
      <input type="text" name="newPseudo" value="<?php echo $userinfo['membre_pseudo'] ?>" placeholder="Nouveau Pseudo">
      <label for="">changer l'email</label>
      <input type="email" name="newEmail" value="<?php echo $userinfo['membre_email'] ?>" placeholder="Nouveau Email">
      <label for="">Changer le mot de passe</label>
      <input type="password" name="newMdp" value="" placeholder="Nouveau mot de passe">
      <input type="password" name="newMdp2" value="" placeholder="Confirmé mot de passe">
      <input type="submit" name="" value="Valider">
    </form>


    <?php if(isset($error)){echo $error;} ?>
  </body>
  </html>
  <?php
}
else {
  header("location: connexion.php");
}
?>
