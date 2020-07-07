<?php
  $text = $_POST["search"];
  $type = $_GET["type"];
  if($text == ""){
    header("Location: /?type=".$type."");
  }
  else  header("Location: /?type=".$type."&search=".base64_encode($text)."");
?>