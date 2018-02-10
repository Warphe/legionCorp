<!doctype html>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=legioncorp', 'root', 'Romjuv02-');

if(isset($_POST['form_inscription']))
{
  $membre_pseudo = htmlspecialchars($_POST['membre_pseudo']);
  $membre_email = htmlspecialchars($_POST['membre_email']);
  $membre_email2 = htmlspecialchars($_POST['membre_email2']);
  $membre_nom = htmlspecialchars($_POST['membre_nom']);
  $membre_prenom = htmlspecialchars($_POST['membre_prenom']);
  $membre_mdp = sha1($_POST['membre_mdp']);
  $membre_mdp2 = sha1($_POST['membre_mdp2']);

  if(!empty($_POST['membre_email'] ) AND ($_POST['membre_email2'] ) AND ($_POST['membre_mdp'] ) AND ($_POST['membre_mdp2'] ) AND ($_POST['membre_nom']) AND ($_POST['membre_nom']) AND ($_POST['membre_prenom']))
  {
    $membre_pseudolength = strlen($membre_pseudo);
    if($membre_pseudolength <= 255)
    {
      $reqpseudo = $bdd->prepare("SELECT * FROM membre WHERE membre_pseudo = ?");
      $reqpseudo->execute(array($membre_pseudo));
      $pseudoexist = $reqpseudo->rowCount();
      if($pseudoexist == 0)
      {
        $membre_emaillength = strlen($membre_email);
        if($membre_emaillength <= 255)
        {
          $membre_email2length = strlen($membre_email2);
          if($membre_email2length <= 255)
          {
            $membre_nomlength = strlen($membre_nom);
            if($membre_nomlength <= 255)
            {
              $membre_prenomlength = strlen($membre_prenom);
              if($membre_prenomlength <= 255)
              {
                if($membre_email == $membre_email2)
                {
                  if(filter_var($membre_email, FILTER_VALIDATE_EMAIL))
                  {
                    $reqemail = $bdd->prepare("SELECT * FROM membre WHERE membre_email = ?");
                    $reqemail->execute(array($membre_email));
                    $emailexist = $reqemail->rowCount();
                    if($emailexist == 0)
                    {
                      if($membre_mdp == $membre_mdp2)
                      {
                        $insertmbr = $bdd->prepare("INSERT INTO membre(membre_mdp, membre_pseudo, membre_nom, membre_prenom, membre_email) VALUES(?, ?, ?, ?, ?)");
                        $insertmbr->execute(array($membre_mdp, $membre_pseudo, $membre_nom, $membre_prenom, $membre_email));
                        $error = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                      }
                      else
                      {
                        $error = "Vos mot de passes ne correspondent pas !";
                      }
                    }
                    else
                    {
                      $error = "Cet email est deja utilisé !";
                    }
                  }
                  else
                  {
                    $error = "Votre email n'est pas valide !";
                  }
                }
                else
                {
                  $error = "Vos email de corresponde pas !";
                }
              }
              else
              {
                $error = "Votre prenom ne doit pas contenir plus de 255 caractères !";
              }
            }
            else
            {
              $error = "Votre nom ne doit pas contenir plus de 255 caractères !";
            }
          }
          else
          {
            $error = "Votre mail de confirmation ne doit pas contenir plus de 255 caractères !";
          }
        }
        else
        {
          $error = "Votre mail ne doit pas contenir plus de 255 caractères !";
        }
      }
      else
      {
        $error = "Le pseudo que vous avez demandez existe déjà !";
      }
    }
    else
    {
      $error = "Votre pseudo ne doit pas contenir plus de 255 caractères !";
    }
  }
  else
  {
    $error = "Tout les champs doivent être complétés !";
  }
}


?>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Romain Juvigny">
  <meta name="description" content="Page d'inscription site officiel de legion Corp.">
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

  <!-- form-inscription -->
  <form class="form-signin" action="" method="post">
    <h2 class="h3 md-3">Bienvenue, future légionnaire !</h2>
    <label for="membre_nom" class="sr-only">Nom de votre légionnaire</label>
    <input type="text" name="membre_nom" class="form-control form-pack-top" value="<?php if(isset($membre_nom)){echo "$membre_nom";} ?>" placeholder="Nom du légionnaire" id="membre_nom" required autofocus>
    <label for="membre_prenom" class="sr-only">Prenom de votre légionnaire</label>
    <input type="text" name="membre_prenom" class="form-control form-pack-middle" value="<?php if(isset($membre_prenom)){echo "$membre_prenom";} ?>" placeholder="Prenom du légionnaire" id="membre_prenom" required>
    <label for="membre_pseudo" class="sr-only">Pseudo</label>
    <input type="text" name="membre_pseudo" class="form-control form-pack-bottom" value="<?php if(isset($membre_pseudo)){echo "$membre_pseudo";} ?>" placeholder="Pseudo" id="membre_pseudo" required>
    <label for="membre_email" class="sr-only">Email</label>
    <input type="email" name="membre_email" class="form-control form-pack-top" value="<?php if(isset($membre_email)){echo "$membre_email";} ?>" placeholder="Email" id="membre_email" required>
    <label for="membre_email2" class="sr-only">Confirmé votre email</label>
    <input type="email" name="membre_email2" class="form-control form-pack-bottom" value="<?php if(isset($membre_email2)){echo "$membre_email2";} ?>" placeholder="Confirmation de votre email" id="membre_email2" required>
    <label for="membre_mdp" class="sr-only">Votre mot de passe</label>
    <input type="password" name="membre_mdp" class="form-control form-pack-top" value="" placeholder="Mot de passe" id="membre_mdp">
    <label for="membre_mdp2" class="sr-only">Confirmé votre mot de passe</label>
    <input type="password" name="membre_mdp2" class="form-control form-pack-bottom" value="" placeholder="Confirmation du mot de passe" id="membre_mdp2">
    <input type="submit" name="form_inscription" value="Je m'inscris !" class="btn btn-custom">
  </form>
    <?php
    if (isset($error))
    {
      ?>
      <p id="error">
        <?php echo $error; ?>
      </p>
    <?php } ?>
    <!--end form-inscription-->
  </body>
  </html>
