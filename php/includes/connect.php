<?php

  $connect = mysqli_connect("localhost", "root", "root", "news-portal");
  if(!$connect){
    die("No connection to DataBase!");
  }

?>