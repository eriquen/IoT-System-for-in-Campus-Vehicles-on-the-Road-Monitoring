<?php 
include("admin/includes/init.php"); 
// if( ! $session->loggedIn() ){ redirect("login.php"); } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>VMS</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@400;500;700&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
  <link href="./css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="./css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="./admin/css/style.css" type="text/css" rel="stylesheet" />
  <link href="./admin/css/padding_margin.css" type="text/css" rel="stylesheet"  >
</head>

<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo Pacifico"><img class="img_logo" src="./admin/images/logo/unimap_logo.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <?php if(!$session->loggedIn()){?>
          <li><a href="login.php">Login</a></li>
          <?php }else{ ?>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="summon_list.php">Summon</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php } ?>
     
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="index.php">Home</a></li>
      <?php if(!$session->loggedIn()){?>
        <li><a href="login.php">Login</a></li>
      <?php }else{ ?>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="summon_list.php">Summon</a></li>
        <li><a href="logout.php">Logout</a></li>
        
      <?php } ?>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
