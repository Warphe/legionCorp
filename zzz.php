<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Romain Juvigny">
  <meta name="description" content="Page accueil site officiel de legion Corp.">
  <meta name="keywords" content="legion, corp">
  <title>Accueil</title>

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
  <div class="dropdown-menu">
    <form class="px-4 py-3">
      <div class="form-group">
        <label for="exampleDropdownFormEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
      </div>
      <div class="form-group">
        <label for="exampleDropdownFormPassword1">Password</label>
        <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">New around here? Sign up</a>
    <a class="dropdown-item" href="#">Forgot password?</a>
  </div>
</body>
</html>
