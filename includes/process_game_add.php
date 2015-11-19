<?php
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();

  $user_id = htmlentities($_SESSION['user_id']);

  $game_title = $_POST["game_title"];
  $game_url = $_POST["game_url"];


  $game_title = $mysqli->real_escape_string($game_title);
  $game_url = $mysqli->real_escape_string($game_url);


  if($mysqli->query("INSERT INTO `jamhub`.`account_games` (`idx`, `fk_user_id`, `game_name`, `game_url`) VALUES (NULL, ".$user_id.", '".$game_title."', '".$game_url."')")){
    header('Location: ../add_game_success.php');
    printf("%d Row inserted.\n", $mysqli->affected_rows);
  }
  else{
    echo 'Invalid request';
  }
 ?>
