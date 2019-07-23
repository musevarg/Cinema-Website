<?php

  $register = '<a href="login.php"><h6>Register</h6></a>';
  $login = '<a href="login.php"><h6>Login</h6></a>';

session_start();

if(isset($_SESSION["userid"]))
{
  $register = '<a href="profile.php"><h6>Hi, '.$_SESSION["username"].'</h6></a>';
  $login = '<a href="scripts/logout.php"><h6>Log out</h6></a>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_Key" type="text/javascript"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
    

    <title>Bioscoop</title>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>

    <!-- date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>

<!--BANNER-->

<div class="topbar">
    <a class="navbar-brand" href="index.php">
    <img src="img/logo.png"  alt="">
  </a>
  <div class="login">
    <img width="25" height="25" src="img/login.png" />
    <?php echo $register ?>
    <h6 class="sep">|</h6>
    <?php echo $login ?>
  </div>
</div>

<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="login2">
    <img width="25" height="25" src="img/login2.png" />
    <?php echo $register ?>
    <h6 class="sep">|</h6>
    <?php echo $login ?>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto menu-center">
      <li class="nav-item active ">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <div class="menu-separator"></div>
      <li class="nav-item">
        <a class="nav-link" href="index.php#whatson">WHAT'S ON</a>
      </li>
      <div class="menu-separator"></div>
       <li class="nav-item">
        <a class="nav-link" href="index.php#comingsoon">COMING SOON</a>
      </li>
      <div class="menu-separator"></div>
      <li class="nav-item">
        <a class="nav-link" href="index.php#findus">FIND US</a>
      </li>
      <div class="menu-separator"></div>
      <li class="nav-item">
        <a class="nav-link booknow" href="index.php#whatson">BOOK NOW!</a>
      </li>
    </ul>
  </div>
</nav>
<!--/NAVBAR-->

<div class="divider">
</div>