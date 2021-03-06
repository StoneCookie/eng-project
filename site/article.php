<?php
	session_start();
	require_once "php/includes/connect.php";
	if(!isset($_GET['type']) and !isset($_GET['id'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/php/files/ico/db-favicon.png" type="image/png">
	<link rel="stylesheet" href="../libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<title>Daily Bugle</title>
</head>

<body class="my-container scrollbar">

	<!-- БЛОК АККАУНТА -->
	<div class="account pt-3">
		<div class="account__inner <?php
															if(isset($_SESSION['user'])){
																echo "d-none";
															}
														?>">
			<a data-toggle="modal" class="account__link" data-backdrop="static" data-keyboard="false" data-keyboard="true"
				href="#modal-window">ВОЙТИ</a>
			<a data-toggle="modal" class="account__link" data-backdrop="static" data-keyboard="false" data-keyboard="true"
				href="#modal-window">РЕГИСТРАЦИЯ</a>
		</div>
		<div class="account__inner <?php
															if(!isset($_SESSION['user'])){
																echo "d-none";
															}
														?>">
			<a class="account__link" href="/profile.php">
				<svg width="35" height="35" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M39.9741 38.965L38.9741 34.965C38.4996 33.0245 37.0612 31.464 35.1657 30.8334L27.8324 28.39C26.044 27.645 25.2257 24.765 25.049 23.6716C26.4117 22.5385 27.2885 20.9263 27.499 19.1666C27.4689 18.8661 27.5399 18.5641 27.7006 18.3083C27.9605 18.2432 28.1732 18.0571 28.2723 17.8083C28.7521 16.6464 29.0533 15.4186 29.1656 14.1666C29.1659 14.0986 29.1575 14.0309 29.1406 13.965C29.0213 13.4785 28.7353 13.0492 28.3323 12.7516V8.33328C28.3323 5.64828 27.5123 4.54664 26.6489 3.90828C26.4841 2.615 25.0991 0 19.9991 0C15.4743 0.182187 11.8479 3.80859 11.6657 8.33336V12.7517C11.2628 13.0493 10.9767 13.4786 10.8574 13.9651C10.8405 14.0309 10.8321 14.0988 10.8324 14.1667C10.9446 15.4193 11.2457 16.6477 11.7257 17.8101C11.7979 18.0456 11.9872 18.2268 12.2257 18.2884C12.3191 18.3351 12.4941 18.5768 12.4941 19.1668C12.7059 20.9315 13.5878 22.5473 14.9574 23.6802C14.7824 24.7718 13.9691 27.6502 12.2308 28.3768L4.83244 30.8334C2.93846 31.464 1.50096 33.023 1.0258 34.9618L0.0258021 38.9618C-0.087401 39.4079 0.182443 39.8613 0.628537 39.9745C0.695177 39.9915 0.763693 40.0001 0.832443 40.0002H39.1658C39.626 40 39.999 39.6268 39.9989 39.1666C39.9988 39.0985 39.9905 39.0309 39.9741 38.965Z"
						fill="#7289DA" />
				</svg>
			</a>
			<a class="account__link" href="/php/includes/logout.php">ВЫЙТИ</a>
		</div>
	</div>

	<!-- ШАПКА -->
	<header class="header pb-2">

		<div class="header__inner">

			<!-- БУРГЕР МЕНЮ -->
			<div class="burger">
				<span></span>
			</div>

			<!-- ЛОГОТИП -->
			<h1 class="header__logo"><a href="/index.php" class="text-white"><span>Daily Bugle</span></a></h1>

			<!-- БЛОК ПОИСКА -->
			<div class="search-wrap" style="<?php if(isset($_GET['id'])) echo 'height: 0; overflow: hidden;'?>">
				<form action="#" class="search">
					<input class="search__input pl-3" placeholder="ПОИСК" type="text">
					<button class="search__btn" type="submit">
						<svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M18.3463 16.1377C19.5766 14.4577 20.3124 12.3941 20.3124 10.1571C20.3124 4.55716 15.7561 0.00088501 10.1562 0.00088501C4.55623 0.00088501 0 4.55716 0 10.1571C0 15.7571 4.55628 20.3133 10.1562 20.3133C12.3933 20.3133 14.457 19.5774 16.137 18.3472L22.7905 25.0007L25 22.7913C25 22.7912 18.3463 16.1377 18.3463 16.1377ZM10.1562 17.1883C6.27897 17.1883 3.12501 14.0344 3.12501 10.1571C3.12501 6.27986 6.27897 3.1259 10.1562 3.1259C14.0335 3.1259 17.1874 6.27986 17.1874 10.1571C17.1874 14.0344 14.0334 17.1883 10.1562 17.1883Z" />
						</svg>
					</button>
				</form>
				<button class="search-wrap__btn search__btn_disable"><svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M18.3463 16.1377C19.5766 14.4577 20.3124 12.3941 20.3124 10.1571C20.3124 4.55716 15.7561 0.00088501 10.1562 0.00088501C4.55623 0.00088501 0 4.55716 0 10.1571C0 15.7571 4.55628 20.3133 10.1562 20.3133C12.3933 20.3133 14.457 19.5774 16.137 18.3472L22.7905 25.0007L25 22.7913C25 22.7912 18.3463 16.1377 18.3463 16.1377ZM10.1562 17.1883C6.27897 17.1883 3.12501 14.0344 3.12501 10.1571C3.12501 6.27986 6.27897 3.1259 10.1562 3.1259C14.0335 3.1259 17.1874 6.27986 17.1874 10.1571C17.1874 14.0344 14.0334 17.1883 10.1562 17.1883Z" />
				</svg></button>
			</div>
		</div>

		<!-- НАВИГАЦИЯ -->
		<?php
			include_once "php/urls/menu.php";
		?>
	</header>

	<!-- ОСНОВНОЙ КОНТЕНТ -->
	<?php
			$type = $_GET["type"];
			$id = $_GET["id"];
			switch($type){
				case "film":
					$type = "кино";
					break;
				case "sport":
					$type = "спорт";
					break;
				case "music":
					$type = "музыка";
					break;
				case "history":
					$type = "история";
					break;
				case "travel":
					$type = "путешествия";
					break;
				case "art":
					$type = "искусство";
					break;
				case "mode":
					$type = "мода";
					break;
				case "business":
					$type = "экономика";
					break;
				case "tech":
					$type = "технологии";
					break;
				case "politic":
					$type = "политика";
					break;
			}

			$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM articles JOIN authors ON articles.author_id = authors.id JOIN themes ON articles.theme_id = themes.id WHERE themes.name = '$type' AND articles.id = '$id'"))[0];
		?>
	<main class="main">
		<div class="main-inner flex-wrap">
			<h2 class="main-inner__title mb-0"><?=$data[3]?></h2>
			<?php
					switch($_SESSION["user"]["type"]){
						case "admin":
							include_once "php/urls/edit.php";
							break;
						case "author":
							include_once "php/urls/edit.php";
							break;
					}
				?>
		</div>
		<section class="article">
			<div class="article__inner">
				<span class="article__info"><?= 'ДАТА: '.$data[5]?></span>
				<img class="article__img my-1" src="../php/files/<?=$data[6]?>" alt="">
				<span class="article__info"><?= 'АВТОР: '.mb_strtoupper($data[8])?></span>
			</div>
			<p class="article__text"><?=$data[4]?></p>
		</section>
	</main>

	<!-- ПОДВАЛ -->
	<footer class="foo">

		<!-- ТЕКСТ -->
		<p class="foo-text">
			<span class="foo-text__item">Пережогин Федор Владимирович</span>
			<span class="foo-text__item">группа 191-322</span>
			<span class="foo-text__item">&#169; 2020, Все права защищены</span>
		</p>
		<div class="foo-list">

			<!-- TWITER -->
			<a class="foo-list__item" href="">
				<svg class="foo-list__ico" width="40" height="40" viewBox="0 0 40 40" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M20 0C8.95599 0 0 8.95599 0 20C0 31.044 8.95599 40 20 40C31.044 40 40 31.044 40 20C40 8.95599 31.044 0 20 0ZM29.1318 15.5939C29.1406 15.7907 29.1449 15.9885 29.1449 16.1871C29.1449 22.2531 24.5276 29.248 16.0837 29.2484H16.084H16.0837C13.4912 29.2484 11.0788 28.4885 9.04724 27.1863C9.40643 27.2287 9.77203 27.2498 10.1422 27.2498C12.2931 27.2498 14.2725 26.5161 15.8438 25.2847C13.8342 25.2475 12.1399 23.9203 11.5552 22.0963C11.835 22.15 12.1228 22.1793 12.4179 22.1793C12.8369 22.1793 13.2428 22.1228 13.6285 22.0175C11.528 21.597 9.94568 19.7406 9.94568 17.5177C9.94568 17.4969 9.94568 17.4783 9.94629 17.4591C10.5649 17.803 11.2723 18.0099 12.0255 18.0331C10.7928 17.2107 9.9826 15.8047 9.9826 14.212C9.9826 13.371 10.21 12.583 10.6042 11.9046C12.868 14.6823 16.2512 16.5091 20.0665 16.701C19.9878 16.3647 19.9472 16.0144 19.9472 15.6543C19.9472 13.1201 22.0032 11.0641 24.5383 11.0641C25.8588 11.0641 27.0514 11.6223 27.8891 12.5146C28.9349 12.3083 29.917 11.9263 30.8041 11.4005C30.4608 12.4719 29.7333 13.371 28.7854 13.9395C29.7141 13.8284 30.5991 13.5822 31.4215 13.2166C30.8072 14.1373 30.0281 14.946 29.1318 15.5939Z" />
				</svg>
			</a>

			<!-- YOUTUBE -->
			<a class="foo-list__item" href="https://www.youtube.com">
				<svg class="foo-list__ico" width="40" height="40" viewBox="0 0 40 40" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path d="M17.5089 23.7471L24.0146 20.0001L17.5089 16.2532V23.7471Z" />
					<path
						d="M20 0C8.95599 0 0 8.95599 0 20C0 31.044 8.95599 40 20 40C31.044 40 40 31.044 40 20C40 8.95599 31.044 0 20 0ZM32.4969 20.0204C32.4969 20.0204 32.4969 24.0765 31.9824 26.0324C31.694 27.103 30.8499 27.9471 29.7794 28.2352C27.8235 28.75 20 28.75 20 28.75C20 28.75 12.197 28.75 10.2206 28.2147C9.15009 27.9266 8.30597 27.0822 8.01758 26.0117C7.50275 24.0765 7.50275 20 7.50275 20C7.50275 20 7.50275 15.9442 8.01758 13.9883C8.30566 12.9178 9.17053 12.0529 10.2206 11.7648C12.1765 11.25 20 11.25 20 11.25C20 11.25 27.8235 11.25 29.7794 11.7853C30.8499 12.0734 31.694 12.9178 31.9824 13.9883C32.5177 15.9442 32.4969 20.0204 32.4969 20.0204Z" />
				</svg>
			</a>

			<!-- FACEBOOK -->
			<a class="foo-list__item" href="#">
				<svg class="foo-list__ico" width="40" height="40" viewBox="0 0 40 40" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M40 20C40 8.95312 31.0469 0 20 0C8.95312 0 0 8.95312 0 20C0 31.0469 8.95312 40 20 40C20.1172 40 20.2344 40 20.3516 39.9922V24.4297H16.0547V19.4219H20.3516V15.7344C20.3516 11.4609 22.9609 9.13281 26.7734 9.13281C28.6016 9.13281 30.1719 9.26562 30.625 9.32812V13.7969H28C25.9297 13.7969 25.5234 14.7812 25.5234 16.2266V19.4141H30.4844L29.8359 24.4219H25.5234V39.2266C33.8828 36.8281 40 29.1328 40 20Z" />
				</svg>
			</a>

			<!-- INSTAGRAM -->
			<a class="foo-list__item" href="#">
				<svg class="foo-list__ico" width="40" height="40" viewBox="0 0 40 40" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M23.8281 20C23.8281 22.1143 22.1143 23.8281 20 23.8281C17.8857 23.8281 16.1719 22.1143 16.1719 20C16.1719 17.8857 17.8857 16.1719 20 16.1719C22.1143 16.1719 23.8281 17.8857 23.8281 20Z" />
					<path
						d="M28.9526 13.2269C28.7686 12.7282 28.475 12.2769 28.0936 11.9064C27.7231 11.5249 27.272 11.2313 26.7731 11.0473C26.3684 10.8901 25.7605 10.7031 24.6408 10.6521C23.4296 10.5969 23.0664 10.585 20 10.585C16.9333 10.585 16.5701 10.5966 15.3592 10.6518C14.2395 10.7031 13.6313 10.8901 13.2269 11.0473C12.728 11.2313 12.2766 11.5249 11.9064 11.9064C11.525 12.2769 11.2314 12.7279 11.0471 13.2269C10.8899 13.6315 10.7028 14.2397 10.6519 15.3594C10.5966 16.5704 10.5847 16.9335 10.5847 20.0002C10.5847 23.0667 10.5966 23.4298 10.6519 24.6411C10.7028 25.7607 10.8899 26.3687 11.0471 26.7733C11.2314 27.2723 11.5247 27.7233 11.9061 28.0938C12.2766 28.4753 12.7277 28.7689 13.2266 28.9529C13.6313 29.1104 14.2395 29.2974 15.3592 29.3484C16.5701 29.4036 16.933 29.4152 19.9997 29.4152C23.0667 29.4152 23.4299 29.4036 24.6405 29.3484C25.7602 29.2974 26.3684 29.1104 26.7731 28.9529C27.7747 28.5665 28.5663 27.7749 28.9526 26.7733C29.1098 26.3687 29.2969 25.7607 29.3481 24.6411C29.4034 23.4298 29.415 23.0667 29.415 20.0002C29.415 16.9335 29.4034 16.5704 29.3481 15.3594C29.2972 14.2397 29.1101 13.6315 28.9526 13.2269ZM20 25.8972C16.7429 25.8972 14.1025 23.2571 14.1025 19.9999C14.1025 16.7428 16.7429 14.1027 20 14.1027C23.2568 14.1027 25.8972 16.7428 25.8972 19.9999C25.8972 23.2571 23.2568 25.8972 20 25.8972ZM26.1304 15.2477C25.3693 15.2477 24.7522 14.6307 24.7522 13.8696C24.7522 13.1085 25.3693 12.4914 26.1304 12.4914C26.8915 12.4914 27.5085 13.1085 27.5085 13.8696C27.5082 14.6307 26.8915 15.2477 26.1304 15.2477Z" />
					<path
						d="M20 0C8.95599 0 0 8.95599 0 20C0 31.044 8.95599 40 20 40C31.044 40 40 31.044 40 20C40 8.95599 31.044 0 20 0ZM31.4151 24.7348C31.3596 25.9573 31.1652 26.792 30.8813 27.5226C30.2847 29.0652 29.0652 30.2847 27.5226 30.8813C26.7923 31.1652 25.9573 31.3593 24.7351 31.4151C23.5104 31.4709 23.1192 31.4844 20.0003 31.4844C16.8811 31.4844 16.4902 31.4709 15.2652 31.4151C14.043 31.3593 13.208 31.1652 12.4777 30.8813C11.7111 30.593 11.0172 30.141 10.4434 29.5566C9.85931 28.9832 9.40735 28.2889 9.11896 27.5226C8.83514 26.7923 8.64075 25.9573 8.58521 24.7351C8.52875 23.5101 8.51562 23.1189 8.51562 20C8.51562 16.8811 8.52875 16.4899 8.5849 15.2652C8.64044 14.0427 8.83453 13.208 9.11835 12.4774C9.40674 11.7111 9.85901 11.0168 10.4434 10.4434C11.0168 9.85901 11.7111 9.40704 12.4774 9.11865C13.208 8.83484 14.0427 8.64075 15.2652 8.5849C16.4899 8.52905 16.8811 8.51562 20 8.51562C23.1189 8.51562 23.5101 8.52905 24.7348 8.58521C25.9573 8.64075 26.792 8.83484 27.5226 9.11835C28.2889 9.40674 28.9832 9.85901 29.5569 10.4434C30.141 11.0172 30.5933 11.7111 30.8813 12.4774C31.1655 13.208 31.3596 14.0427 31.4154 15.2652C31.4713 16.4899 31.4844 16.8811 31.4844 20C31.4844 23.1189 31.4713 23.5101 31.4151 24.7348Z" />
				</svg>
			</a>
		</div>
	</footer>

	<!-- МОДАЛЬНОЕ ОКНО РЕДАКТИРОВАНИЯ И УДАЛЕНИЯ -->
	<div class="modal fade scrollbar" id="update-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#page-edit" role="tab">Редактирование</a>
						</li>
					</ul>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pt-1">
					<div class="tab-content">

						<!-- ФОРМА РЕДАКТИРОВАНИЯ -->
						<div class="tab-pane fade" id="page-edit" role="tabpanel">
							<form action="/php/includes/form_edit.php/?type=<?=$_GET["type"]?>&id=<?=$_GET["id"]?>" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Заголовок: </label>
									<input type='text' class='form-control' placeholder='Замените заголовок' name='edit1'>
								</div>
								<div class="form-group">
									<label>Описание: </label>
									<textarea class="form-control news-description scrollbar" id="news-description" placeholder="Замените описание" name='edit2'></textarea>
								</div>
						<label for="">Изображение:</label>
						<div class = "custom-file">
						<input type="file" class="custom-file-input" id="download-news-photo" name = "edit3">
						<label class="custom-file-label news-photo-label" for="download-news-photo">Загрузить фото</label>
						</div>
						<div class="form-check p-0 mb-3">
							<label class="form-check-label">Подтверждаю свои действия
								<input class="form-check-input ml-2" type="checkbox" name = "editable">
							</label>
						</div>
						<div class="modal-footer p-0">
					<button type="submit" class="btn news-submit mt-3 mr-0">ОТПРАВИТЬ</button>
						</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- МОДАЛЬНОЕ ОКНО -->
	<div class="modal fade scrollbar" id="modal-window">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#page-in" role="tab">Вход</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#page-up" role="tab" aria-selected="false">Регистрация</a>
						</li>
					</ul>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pt-1">
					<div class="tab-content">

						<!-- ФОРМА АВТОРИЗАЦИИ -->
						<div class="tab-pane fade" id="page-in" role="tabpanel">
							<form action = "php/auth/signin.php" method = "post">
								<label for="enter-log" class="col-form-label">E-mail:</label>
								<input type="text" class="form-control" id="enter-log" placeholder="Введите ваш e-mail" name = "email">
								<label for="enter-pass" class="col-form-label">Пароль:</label>
								<input type="password" class="form-control" id="enter-pass" placeholder="Введите ваш пароль" name = "password">
								<div class="modal-footer">

									<!-- Выводить если пользователь ошибся -->
									<p class="d-none">Введите правильный пароль!</p>

									<button type="submit" class="btn modal__btn px-4 py-1">Войти</button>
								</div>
							</form>
						</div>

						<!-- ФОРМА РЕГИСТРАЦИИ -->
						<div class="tab-pane fade" id="page-up" role="tabpanel">
							<form action = "php/register/signup.php" method = "post">
								<div class="form-group">
									<label for="reg-name" class="col-form-label">Введите ваше имя и
										фамилию:<span class="text-danger"> *</span></label>
									<input type="text" class="form-control" id="reg-name" placeholder="Введите ваше ФИО" name = "name">
								</div>
								<div class="form-group">
									<label for="reg-mail" class="col-form-label">E-mail:<span class="text-danger"> *</span></label>
									<input type="email" class="form-control" id="reg-mail" placeholder="Введите ваш e-mail" name = "email">
								</div>
								<div class="form-group">
									<label for="reg-pass" class="col-form-label">Пароль:<span class="text-danger"> *</span></label>
									<input type="password" class="form-control" id="reg-pass" placeholder="Придумайте надежный пароль" name = "pass1">
								</div>
								<div class="form-group">
									<label for="reg-pass-confirm" class="col-form-label">Повторите ваш
										пароль:<span class="text-danger"> *</span></label>
									<input type="password" class="form-control" id="reg-pass-confirm" placeholder="Повторите пароль" name = "pass2">
								</div>
								<div class="form-group">
									<label for="select-theme" class="col-form-label">Зарегистрироваться как:<span class="text-danger">
											*</span></label>
									<select class="custom-select" name="type" id="select-theme">
										<option selected disabled>Выберите роль</option>
										<option value="user">Пользователь</option>
										<option value="author">Редактор</option>
									</select>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn modal__btn">Зарегистрироваться</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../libs/js/jquery-3.5.1.min.js"></script>
	<script src="../libs/js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
</body>

</html>
