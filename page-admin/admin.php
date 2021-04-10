<? require "../templates/header.php"; ?>
<?
$data = $_POST;
$user = R::load('user', $_SESSION['logged_user']->id);

 if($user->level < 2) { ?> 
		<script type="text/javascript">
		window.location = "../page-cabinet/cabinet.php"
		</script> 
		<? } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Администрация</title>
</head>
<body class="back-gray">
<section class="back-white h-80">
	<div class="container">
		<h3 class="text-center pt-20">Панель администратора</h3>
	</div>
</section>

</section>
<section class="container">
	<div class="wight-position w-50 p-25">  <!-- Левый столбец -->
		<h5 class="text-center mb-30">Добавить Кинотеатр</h5>
		<form method="POST" class="" id="f_add_cinema">
			<span id="resultat"></span>
			<span>Название:</span>
			<input required id="text1" class="border-input d-inline w-75 mb-30" type="text" name="cinema_name"> <div></div>
			<span>Адресс:</span>
			<input required id="text2" class="border-input d-inline w-75 mb-30 ml-19" type="text" name="adress"> <div></div>
			<span>Иконка:</span>
			<input required placeholder="Ссылка на файл" id="text3" class="border-input d-inline w-75 mb-30 ml-16" type="text" name="icon_link"> <div></div>
			<div class="ml-150">
			<button class="btn btn-secondary" type="submit" id="add_cinema" class="d-block">Добавить кинотеатр</button>
			<button id="clear1" class="btn btn-secondary" type="button" class="d-block">Очистить</button>
			</div>
		</form>
		<hr>
	<div>
		<h5 class="text-center mb-30">Удалить Кинотеатр</h5>
		<span id="resultat_delete_cinema"></span>
		<div class="scrolled h-380" id="delete_cinema_div">

			<?
			$cinema = R::findAll('cinemas');
			foreach($cinema as $value)
  			{
  				echo '
			  			<div class="selected-option" id="'.$value->id.'">
							<div class="pt-10 pl-10 w-75 wight-position">
								<p>'.$value->name.' <br> <span class="fs-14">'.$value->adress.'</span> </p>
							</div>
							<div>
								<button onclick="delete_cinema(value)" id="delete_cinema" name="cinema_id" value="'.$value->id.'" type="button"  class="float-right btn btn-danger">✘</button>
							</div>
							<div style="clear: both;"></div>
						</div>
						
  				';
  			}
			 ?>
   		</div>
	</div>
	<hr>
	</div>
	<div class="wight-position p-25 w-50"> <!-- Правый столбец -->
		<h5 class="text-center mb-30">Добавить Фильм</h5>
		<form method="POST" class="" id="f_add_film">
			<span id="resultat2"></span>
			<span>Название:</span>
			<input required id="text4" class="float-right border-input d-inline w-75" type="text" name="film_title"> <div class="mb-30"></div>
			<span>Год:</span>
			<input required id="text5" class="float-right border-input d-inline w-75 ml-19" type="text" name="year"> <div class="mb-30"></div>
			<span>Страна:</span>
			<input required id="text6" class="float-right border-input d-inline w-75 ml-16" type="text" name="country"> <div class="mb-30"></div>
			<span>Язык:</span>
			<input required id="text7" class="float-right border-input d-inline w-75 ml-16" type="text" name="lang"> <div class="mb-30"></div>
			<span>Жанр:</span>
			<input required id="text8" class="float-right border-input d-inline w-75 ml-16" type="text" name="genre"> <div class="mb-30"></div>
			<span>Длительность:</span>
			<input required id="text9" class="float-right border-input d-inline w-75 ml-16" type="text" name="duration"> <div class="mb-30"></div>
			<span>Прокат:</span>
			<input required placeholder="С какой даты" id="text10" class="float-right border-input d-inline w-75 ml-16" type="text" name="rental"> <div class="mb-30"></div>
			<span>Трейлер:</span>
			<input required placeholder="Ссылка на видео" id="text11" class="float-right border-input d-inline w-75 ml-16" type="text" name="trailer"> <div class="mb-30"></div>
			<span>Постер:</span>
			<input required placeholder="Ссылка на постер" id="text12" class="float-right border-input d-inline w-75 ml-16" type="text" name="poster"> <div class="mb-50"></div>
			<div  class="ml-208">
			<button class="btn btn-secondary" type="submit" id="add_film" class="d-block">Добавить Фильм</button>
			<button id="clear2" class="btn btn-secondary" type="button" class="d-block">Очистить</button>
			</div>
		</form>
		<hr>
	<div>
		<h5 class="text-center mb-30">Удалить Фильм</h5>
		<span id="resultat_delete_film"></span>
		<span id="resultat_delete_cinema"></span>
		<div class="scrolled h-380" id="delete_cinema_div">

			<?
			$film = R::findAll('films');
			foreach($film as $value)
  			{
  				echo '
			  			<div class="selected-option" id="'.$value->title.'">
							<div class="pt-10 pl-10 w-75 wight-position">
								<p>'.$value->title.' <br> <span class="fs-14">'.$value->rental.'</span> </p>
							</div>
							<div>
								<button onclick="delete_film(value, id)" id="'.$value->title.'" name="cinema_id" value="'.$value->id.'" type="button"  class="float-right btn btn-danger">✘</button>
							</div>
							<div style="clear: both;"></div>
						</div>
						
  				';
  			}
			 ?>
   		</div>
	</div>
	<hr>
	</div>
</section>
<div style="clear: both;"></div>
<div class="mt-200"></div>
<? require "../templates/footer.php" ?>
</body>
</html>

<script type="text/javascript">
	$(function()
	{
		$('#f_add_cinema').submit(function(form){
			form.preventDefault();
			var data = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "add_cinema.php",
				data: data,
				success: function(result){
					$('#resultat').html(result);
				}
			});
		});
	});

	$(function()
	{
		$('#f_add_film').submit(function(form){
			form.preventDefault();
			var data = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "add_film.php",
				data: data,
				success: function(result){
					$('#resultat2').html(result);
				}
			});
		});
	});


	function delete_cinema($cinema_id) {
      var data = {id:$cinema_id};
      $.ajax({
				type: "POST",
				url: "delete_cinema.php",
				data: data,
				success: function(result){
					$('#resultat_delete_cinema').html(result);
					document.getElementById($cinema_id).remove();
				}
			});
  }

  function delete_film($film_id, $film_title) {
      var data = {id:$film_id};
      $.ajax({
				type: "POST",
				url: "delete_film.php",
				data: data,
				success: function(result){
					$('#resultat_delete_film').html(result);
					document.getElementById($film_title).remove();
				}
			});
  }


	clear1.onclick = function(event) {
		text1.value = '';
		text2.value = '';
		text3.value = '';
		res.innerHTML ='';
	}

	clear2.onclick = function(event) {
		text4.value = '';
		text5.value = '';
		text6.value = '';
		text7.value = '';
		text8.value = '';
		text9.value = '';
		text10.value = '';
		text11.value = '';
		text12.value = '';
		res2.innerHTML ='';
	}
</script>
