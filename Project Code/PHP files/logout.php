<?php
  session_start(); 
  require 'function.php';
  session_destroy(); //destroy the session
  header('Location: index.php');
  exit();
 ?>
