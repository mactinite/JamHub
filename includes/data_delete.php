<?php
include_once 'db_connect.php';
include_once 'functions.php';

if(isset($_POST['delete_sm']) and is_numeric($_POST['delete_sm']))
{
    $query = "DELETE FROM `account_sm` WHERE `idx` =".$_POST['delete_sm'].";";
    if($mysqli->query($query) === true){
    $mysqli->close();
    header('Location: ../account.php');
    }
}
if(isset($_POST['delete_game']) and is_numeric($_POST['delete_game']))
{
    $query = "DELETE FROM `account_games` WHERE `idx` =".$_POST['delete_game'].";";
    if($mysqli->query($query) === true){
    $mysqli->close();
    header('Location: ../account.php');
    }
}

?>
