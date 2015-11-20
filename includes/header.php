<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>JamHub | <?php echo $title ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/JavaScript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <script type="text/JavaScript" src="js/bootstrap.js"></script>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">JamHub</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Home</a></li>
                <?php if (login_check($mysqli) == true) : ?>
                <li><a href="account.php">Account</a></li>
                <li><a href="#Browse">Browse</a></li>
              <?php endif ?>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
              <?php
              if (login_check($mysqli) == true) {
                echo '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Hello, '. htmlentities($_SESSION['username']) .'<span class="caret"></span></a>';
                echo '<ul class="dropdown-menu">';
                echo  '<li><a href="includes/logout.php">Logout</a></li></ul>';

                } else {
                  echo '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Currently logged '.$logged.'<span class="caret"></span></a>';
                  echo '<ul class="dropdown-menu">';
                  echo  '<li><a href="index.php">Log In</a></li>';
                  echo  '<li><a href="register.php">Register</a></li></ul>';
                        }
              ?>
              </li>
            </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
