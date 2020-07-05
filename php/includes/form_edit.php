<?php

  require_once "connect.php";

  $title = $_POST["edit1"];
  $desc = $_POST["edit2"];

  $id = $_GET['id'];
  $type = $_GET["type"];

  if($_POST["edit1"] != ""){
    mysqli_query($connect, "UPDATE articles SET title = '$title' WHERE articles.id = '$id'");
  }
  if($_POST["edit2"] != ""){
    mysqli_query($connect, "UPDATE articles SET description = '$desc' WHERE articles.id = '$id'");
  }
  if($_FILES['edit3']["name"] != ""){
    $path = time().$_FILES['edit3']["name"];
    move_uploaded_file($_FILES["edit3"]["tmp_name"], "../files/".$path);
    mysqli_query($connect, "UPDATE articles SET img = '$path' WHERE articles.id = '$id'");
  }
  header("Location: /article.php/?type=".$type."&id=".$id."");

?>