<div class="d-flex">
	<button type="button" class="main-inner__btn main-inner__btn_edit" data-backdrop="static" data-keyboard="false" data-toggle="modal"
		data-target="#update-data">
		<span class="main-inner__btn_disable">Редактировать новость</span>
		<img class="main-inner__img" src="/php/files/ico/edit.svg" alt="">
		</button>

		<a href="/php/includes/article_delete.php/?type=<?=$_GET['type']?>&id=<?=$_GET['id']?>" class="main-inner__btn main-inner__btn_del" data-backdrop="static" data-keyboard="false">
			<span class="main-inner__btn_disable">Удалить новость</span>
			<img class="main-inner__img" src="/php/files/ico/delete.svg" alt="">
		</a>
</div>