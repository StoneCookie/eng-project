<?php

  session_start();

  require_once "../includes/connect.php";

  $full_name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["pass1"];
  $retry = $_POST["pass2"];
  $type = $_POST["type"];

  if($password == $retry){
    $password = md5($password);
    if($type == "user"){
      mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$full_name', '$email', '$password')");
    }
    else{
      mysqli_query($connect, "INSERT INTO `authors` (`id`, `name`, `email`, `password`) VALUES (NULL, '$full_name', '$email', '$password')");
    }
    header("Location: ../../index.php");
  }
  else{
    header("Location: ../../index.php");
  }

?>