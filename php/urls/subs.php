<?php
  $user_id = $_SESSION["user"]["id"];

  $subs_db = mysqli_fetch_all(mysqli_query($connect, "SELECT subscribe.id, themes.name FROM `subscribe` JOIN themes ON themes.id = subscribe.theme_id WHERE subscribe.user_id = '$user_id'"));
  echo '		<div class="folow">
  <p class="folow__info">
    Здеь вы можете ознакомиться со своими подписками
  </p>
</div><section class="profile">
  <h2 class="profile__title">Ваши подписки:</h2>
  <ol class="profile__list">';
  for($i=0;$i < count($subs_db); $i++){
    echo '				<li class="profile__item">
    <span class="profile__topic mr-auto ml-1">'.mb_strtoupper($subs_db[$i][1]).'</span>
    <a href="/php/includes/unscribe.php/?id='.$subs_db[$i][0].'" class="profile__link ml-4">ОТПИСАТЬСЯ</a></li>';
  }
  echo '			</ol>
  </section>';
?>