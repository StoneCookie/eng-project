<?php
  if(!isset($_GET["who"])){
		echo '<section class="profile">
			<div class="main-inner mt-5 mb-2">
				<a class="main-inner__btn main-inner__btn_edit" href="?who=add">ПРЕДЛОЖИТЬ НОВОСТЬ</a>
			</div>
		</section>';
  }
  else{
    if($_GET["who"] == "add"){
      echo '<div class="folow">
			<p class="folow__info">
				Здеь вы можете выложить новую новость
			</p>
		</div>
			<section class="profile">
			<form class="col-lg-6" action = "php/includes/add.php" method = "post" enctype="multipart/form-data">
				<div class="form-group p-0">
					<label class="mb-0 mt-3" for="news-topic">ВЫБЕРЕТЕ ТЕМУ:</label>
					<select class="custom-select" name = "type" id="news-topic" required>
          <option selected disabled>ВЫБЕРИТЕ ТЕМУ:</option>
                    <option value="1">СПОРТ</option>
                    <option value="2">МУЗЫКА</option>
                    <option value="3">КИНО</option>
                    <option value="4">ПУТЕШЕСТВИЯ</option>
                    <option value="5">ЭКОНОМИКА</option>
                    <option value="6">ИСТОРИЯ</option>
                    <option value="7">ИСКУССТВО</option>
                    <option value="8">МОДА</option>
                    <option value="9">ПОЛИТИКА</option>
                    <option value="10">ТЕХНОЛОГИИ</option>
					</select>
					<label class="mb-0 mt-3" for="news-title">ЗАГОЛОВОК НОВОСТИ:</label>
					<input type="text" class="form-control" id="news-title" placeholder="максимум 45 символов" required name = "title">
				</div>
				<label class="mb-0 mt-3" for="news-description">ТЕКСТ НОВОСТИ:</label>
				<textarea class="form-control news-description scrollbar" id="news-description" placeholder="" name = "description"></textarea>
				<div class="form-group p-0">
					<label class="mb-0 mt-3" for="download-news-photo">ФОТО К НОВОСТИ:</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="download-news-photo" required name = "img">
						<label class="custom-file-label news-photo-label" for="download-news-photo">Прикрепите фотографию к
							посту</label>
					</div>
				</div>
				<div class="modal-footer p-0">
					<button type="submit" class="btn news-submit mt-3 mr-0">ОТПРАВИТЬ</button>
				</div>
			</form>
		</section>';
    }
  }
?>