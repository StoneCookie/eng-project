<?php

  require_once "connect.php";

  if($_POST["editable"] == "on"){
    $edit_arr = 0;
    $arr = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `articles`")); 
    $names = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `articles`")); 
    for($i = 0; $i < count($arr); $i++){
      if($_GET["who"] == "articles"){
        if($arr[$i][0] == $_POST['unique_id']){
          $edit_arr = $arr[$i];
          break;
        }
      }
    }
    for($i = 0; $i < count($edit_arr); $i++){
      if($_POST["edit".$i] != ""){
        $edit_arr[array_keys($arr[0])[$i]] = $_POST["edit".$i];
      }
    }
    for($i = 0; $i < count($edit_arr); $i++){
      if($_GET["who"] == "articles" && $i == 0){
        continue;
      }
      if($_GET["who"] == "articles"){
        $sql = "UPDATE articles SET ".array_keys($names)[$i]." = '".$edit_arr[$i]."' WHERE ".array_keys($names)[0]." = ".$_POST['unique_id'].";";
        mysqli_query($connect, $sql);
      }
    }
    header("Location: /profile.php");
  }else{
    die("Вы не подтвердили свое действие!");
  }

?>