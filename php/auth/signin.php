<?php
  session_start();
  require_once "../includes/connect.php";

  $email = $_POST["email"];
  $password = $_POST['password'];
  
  $a_pass = $password;

  $password = md5($password);

  $users_db = mysqli_query($connect, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'");
  $authors_db = mysqli_query($connect, "SELECT * FROM `authors` WHERE email = '$email' AND password = '$password'");
  $admins_db = mysqli_query($connect, "SELECT * FROM `admins` WHERE email = '$email' AND password = '$a_pass'");

  if(mysqli_num_rows($users_db) > 0){
    $user = mysqli_fetch_assoc($users_db);
    $_SESSION["user"] = [
      "id" => $user["id"],
      "name" => $user["name"],
      "email" => $email,
      "type" => "user"
    ];
    header("Location: ../../index.php");
  }
  else if(mysqli_num_rows($authors_db) > 0){
    $user = mysqli_fetch_assoc($authors_db);
    $_SESSION["user"] = [
      "name" => $user["name"],
      "email" => $email,
      "type" => "author"
    ];
    header("Location: ../../index.php");
  }
  else if(mysqli_num_rows($admins_db) > 0){
    $user = mysqli_fetch_assoc($admins_db);
    $_SESSION["user"] = [
      "name" => $user["name"],
      "email" => $email,
      "type" => "admin"
    ];
    header("Location: ../../index.php");
  }
  else{
    die("Данные не найдены!");
  }

?>