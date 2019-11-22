<?php
session_start();
require_once('db.php');

$_SESSION["loginStat"] = true;
$_SESSION["passwordStat"] = true;

if($_POST["username"] == "admin"){
  if($_POST["pwd"] == "admin123"){
    $_SESSION["username"] = $_POST["username"];
    header('Location: beranda.php');
  } else {
    $_SESSION["passwordStat"] = false;
    $_SESSION["loginStat"] = false;
    header('Location: index.php');
  }
} else {
  $_SESSION["loginStat"] = false;
  header('Location: index.php');
}




?>
