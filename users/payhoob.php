<?php
include('connection.php');
session_start();

if (!is_null($_SESSION['fromLogin']) && in_array($_SESSION['email'], array('yusuf4u52@gmail.com','tzabuawala@gmail.com','bscalcuttawala@gmail.com','mustafamnr@gmail.com'))) {
 
}
else
  header("Location: login.php");

if($_POST)
{
  //$query = "update thalilist set "
  echo "success";
}