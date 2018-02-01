<!DOCTYPE html>
<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: connexion.php")
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

  </body>
</html>
