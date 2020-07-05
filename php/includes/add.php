<?php
  session_start();
  require_once "connect.php";

  $author = $_SESSION["user"]["name"];

  $author_id = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `authors` WHERE name = '$author'"))["id"];

  $type = $_POST["type"];
  $title = $_POST["title"];
  $description = $_POST["description"];

  $path = time().$_FILES['img']["name"];
  move_uploaded_file($_FILES["img"]["tmp_name"], "../files/".$path);
  $date = date("Y-m-d");

  mysqli_query($connect, "INSERT INTO `articles` (`id`, `theme_id`, `author_id`, `title`, `description`, `date`, `img`) VALUES (NULL, '$type', '$author_id', '$title', '$description', '$date', '$path')");
  
  header('Location: /index.php');

?>