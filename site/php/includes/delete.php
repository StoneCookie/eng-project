<?php

  require_once "connect.php";

  if($_POST['enabled'] == "on"){
    $type = $_POST["option"];
    $text = $_POST["text"];
    if($_GET["who"] == "authors"){
      mysqli_query($connect, "DELETE FROM authors WHERE $type = '$text'");
      header("Location: /profile.php");
    }
    else if($_GET["who"] == "users"){
      mysqli_query($connect, "DELETE FROM users WHERE $type = '$text'");
      header("Location: /profile.php");
    }
    else if($_GET["who"] == "articles"){
      mysqli_query($connect, "DELETE FROM articles WHERE $type = '$text'");
      header("Location: /profile.php");
    }
  }else{
    die("Вы не подтвердили свое действие!");
  }

?>