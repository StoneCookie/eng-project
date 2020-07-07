<?php
  require_once "connect.php";
  $id = $_GET["id"];
  mysqli_query($connect, "DELETE FROM articles WHERE id = '$id'");
  header("Location: /index.php");
?>