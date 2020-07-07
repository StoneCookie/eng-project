<h2 class="main__title mb-2">Новости</h2>
		<section class="content">
		<?php
				$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM articles JOIN authors ON articles.author_id = authors.id JOIN themes ON articles.theme_id = themes.id"));
				for($i=0; $i<count($data);$i++){
					$type_ar = "";
					switch($data[$i][12]){
						case "кино":
							$type_ar = "film";
							break;
						case "спорт":
							$type_ar = "sport";
							break;
						case "музыка":
							$type_ar = "music";
							break;
						case "история":
							$type_ar = "history";
							break;
						case "путешествия":
							$type_ar = "travel";
							break;
						case "искусство":
							$type_ar = "art";
							break;
						case "мода":
							$type_ar = "mode";
							break;
						case "экономика":
							$type_ar = "business";
							break;
						case "технологии":
							$type_ar = "tech";
							break;
						case "политика":
							$type_ar = "politic";
							break;
					}
					echo '<a class="content__item" href="/article.php/?type='.$type_ar.'&id='.$data[$i][0].'">
								<img class="content__img" src="php/files/'.$data[$i][6].'" alt="">
								<div class="content__info">
									<div class="content__inner">
										<span class="content__topic">'.mb_strtoupper($data[$i][12]).'</span>
										<h3 class="content__title">'.$data[$i][3].'</h3>
										<p class="content__text">'.str_replace("�", "", mb_strimwidth($data[$i][4], 0, 100, "...")).'</p>
									</div>
									<span class="content__date">'.$data[$i][5].'</span>
								</div>
							</a>';
				}
		?>
		</section>