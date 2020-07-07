<?php
  $type_ar = "";
  switch($_GET["type"]){
    case "film":
      $type_ar = "кино";
      break;
    case "sport":
      $type_ar = "спорт";
      break;
    case "music":
      $type_ar = "музыка";
      break;
    case "history":
      $type_ar = "история";
      break;
    case "travel":
      $type_ar = "путешествия";
      break;
    case "art":
      $type_ar = "искусство";
      break;
    case "mode":
      $type_ar = "мода";
      break;
    case "business":
      $type_ar = "экономика";
      break;
    case "tech":
      $type_ar = "технологии";
      break;
    case "politic":
      $type_ar = "политика";
      break;
  }
  if(isset($_GET["search"])){
    $search = base64_decode($_GET["search"]);
    $data = mysqli_query($connect, "SELECT * FROM articles JOIN authors ON articles.author_id = authors.id JOIN themes ON articles.theme_id = themes.id WHERE themes.name = '$type_ar' AND articles.title LIKE "."'".$search."%'"."");
  }else{
    $data = mysqli_query($connect, "SELECT * FROM articles JOIN authors ON articles.author_id = authors.id JOIN themes ON articles.theme_id = themes.id WHERE themes.name = '$type_ar'");
  }
  $rows = mysqli_fetch_all($data);
  echo '<div class="main-inner mb-2">
  <h2 class="main-inner__title">'.mb_strtoupper($type_ar).'</h2>';
  if(isset($_SESSION["user"])){
    if($_SESSION["user"]["type"] == "user"){
      $id = $rows[0][1];
			echo '<form action = "php/includes/subscribe.php/?id='.$id.'" method = "post">
				<button type="submit" class="main-inner__btn main-inner__btn_edit">
          <span class="main-inner__btn_disable">Подписаться</span>
          <img src="../img/ico/sub.svg" alt="" class="main-inner__img">
        </button></form>';
    }
  }
  echo '</div>';
  echo '<section class="content">';
  for($i=0; $i< mysqli_num_rows($data); $i++){
    echo '<a class="content__item" href="article.php/?type='.$_GET["type"].'&id='.$rows[$i][0].'">
          <img class="content__img" src="php/files/'.$rows[$i][6].'" alt="">
          <div class="content__info">
            <div class="content__inner">
              <span class="content__topic">'.mb_strtoupper($rows[$i][12]).'</span>
              <h3 class="content__title">'.$rows[$i][3].'</h3>
              <p class="content__text">'.str_replace("�", "", mb_strimwidth($rows[$i][4], 0, 100, "...")).'</p>
            </div>
            <span class="content__date">'.$rows[$i][5].'</span>
          </div>
        </a>';
  }
  echo '</section>';
?>
