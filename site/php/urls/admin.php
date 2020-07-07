<?php
  if(!isset($_GET["who"])) {
		echo '<section class="profile">
			<div class="main-inner mt-5 mb-2 flex-wrap">
				<a class="main-inner__btn main-inner__btn_edit mb-2" href="?who=authors">ТАБЛИЦА АВТОРОВ</a>
				<a class="main-inner__btn main-inner__btn_edit mb-2" href="?who=users">ТАБЛИЦА ПОЛЬЗОВАТЕЛЕЙ</a>
				<a class="main-inner__btn main-inner__btn_edit mb-2" href="?who=articles">ТАБЛИЦА СТАТЕЙ</a>
			</div>
		</section>';
	}
  else{
    switch($_GET["who"]){
      case "authors":
        $arr = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `authors`"));
        $names = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `authors`"));
				echo '<section class="profile" id="table-authors">
				<div class="main-inner mt-5 mb-2">
				<p class="main-inner__title mb-0">Таблица авторов</p>
				<button type="button" class="d-none main-inner__btn main-inner__btn_del" data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#update-data">
					<span class="main-inner__btn_disable">Удалить</span>
					<img class="main-inner__img" src="php/files/ico/delete.svg" alt="Удаление">
				</button>
				<button type="button" class="main-inner__btn main-inner__btn_del" data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#update-data">
					<span class="main-inner__btn_disable">Удалить</span>
					<img class="main-inner__img" src="php/files/ico/delete.svg" alt="Удаление">
				</button>

			</div>';
        echo "<div class='table-responsive scrollbar'><table class = 'table'>
        <thead>
          <tr>";
            for($i = 0; $i < count(array_keys($names)); $i++){
              echo "<th scope='col'>".array_keys($names)[$i]."</th>";
            }
          echo "</tr>
        </thead>
        <tbody>";
          foreach($arr as $value){
            echo "<tr>";
            for($i = 0; $i < count(array_keys($value)); $i++){
              echo "<td>".$value[array_keys($value)[$i]]."</td>";
            }
            echo "</tr>";
          }
        echo "</tbody>
      </table></div></section>";
        break;
      case "users":
        $arr = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `users`"));
        $names = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users`"));
				echo '<section class="profile" id="table-authors">
				<div class="main-inner mt-5 mb-2">
				<p class="main-inner__title mb-0">Таблица пользователей</p>
				<button type="button" class="d-none main-inner__btn main-inner__btn_del" data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#update-data">
					<span class="main-inner__btn_disable">Удалить</span>
					<img class="main-inner__img" src="php/files/ico/delete.svg" alt="Удаление">
				</button>
				<button type="button" class="main-inner__btn main-inner__btn_del" data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#update-data">
					<span class="main-inner__btn_disable">Удалить</span>
					<img class="main-inner__img" src="php/files/ico/delete.svg" alt="Удаление">
				</button>

			</div>';
        echo "<div class='table-responsive scrollbar'><table class='table'><thead>
          <tr>";
            for($i = 0; $i < count(array_keys($names)); $i++){
              echo "<th scope='col'>".array_keys($names)[$i]."</th>";
            }
          echo "</tr>
        </thead>
        <tbody>";
          foreach($arr as $value){
            echo "<tr>";
            for($i = 0; $i < count(array_keys($value)); $i++){
              echo "<td>".$value[array_keys($value)[$i]]."</td>";
            }
            echo "</tr>";
          }
        echo "</tbody>
      </table></div></section>";
        break;
      case "articles":
        $arr = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `articles`"));
        $names = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `articles`"));
        echo '<section class="profile" id="table-authors">
				<div class="main-inner mt-5 mb-2">
				<p class="main-inner__title mb-0">Таблица статей</p>
				<button type="button" class="main-inner__btn main-inner__btn_edit" data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#update-data">
					<span class="main-inner__btn_disable">Отредактировать</span>
					<img class="main-inner__img" src="php/files/ico/edit.svg" alt="Редактирование">
				</button>

				<button type="button" class="main-inner__btn main-inner__btn_del" data-backdrop="static" data-keyboard="false" data-toggle="modal"
					data-target="#update-data">
					<span class="main-inner__btn_disable">Удалить</span>
					<img class="main-inner__img" src="php/files/ico/delete.svg" alt="Удаление">
				</button>

			</div>';
				echo "</div>
				<div class='table-responsive scrollbar'><table class = 'table'>
        <thead>
          <tr>";
            for($i = 0; $i < count(array_keys($names)); $i++){
              echo "<th scope='col'>".array_keys($names)[$i]."</th>";
            }
          echo "</tr>
        </thead>
        <tbody>";
          foreach($arr as $value){
            echo "<tr>";
            for($i = 0; $i < count(array_keys($value)); $i++){
							if($i == 4) {
								echo "<td>".mb_strimwidth($value[array_keys($value)[$i]], 0, 150, "...")."</td>";
							}
							else {
								echo "<td>".$value[array_keys($value)[$i]]."</td>";
							}
            }
            echo "</tr>";
          }
        echo "</tbody>
      </table></div></section>";
        break;
    }
  }
?>