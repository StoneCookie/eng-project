<?php
  require_once "connect.php";
  $id = $_GET["id"];
  mysqli_query($connect, "DELETE FROM subscribe WHERE id = '$id'");
  header("Location: /profile.php");
?>