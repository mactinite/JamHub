<?php
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();

  $user_id = htmlentities($_SESSION['user_id']);

  $sm_id = $_POST["sm_id"];
  $sm_value = $_POST["sm_value"];


  $sm_id = $mysqli->real_escape_string($sm_id);
  $sm_value = $mysqli->real_escape_string($sm_value);


  if($mysqli->query("INSERT INTO `jamhub`.`account_sm` (`idx`, `fk_user_id`, `fk_sm_type`, `sm_url`) VALUES (NULL, ".$user_id.", '".$sm_id."', '".$sm_value."')")){
    header('Location: ../edit_sm_success.php');
    printf("%d Row inserted.\n", $mysqli->affected_rows);
  }
  else{
    echo 'Invalid request';
  }
 ?>
