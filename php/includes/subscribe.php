<?php
  session_start();
  require_once "connect.php";

  $user_id = $_SESSION['user']["id"];
  $theme_id = $_GET["id"];

  mysqli_query($connect, "INSERT INTO `subscribe` (`id`, `user_id`, `theme_id`) VALUES (NULL, '$user_id', '$theme_id')");
  header("Location: /profile.php");
?>