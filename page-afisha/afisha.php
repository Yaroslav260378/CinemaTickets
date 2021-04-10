<? require "../templates/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Афиша</title>
</head>
<body class="back-gray">

<section class="back-white h-130 mb-30">
	<div class="container h-100">
		<div class="select-list wight-position">
			<select>
	  			<option value="0">Все города</option>
	  			<option value="1">Город 1</option>
	  			<option value="2">Город 2</option>
			</select>
		</div>

		<div class="select-list">
			<select>
	  			<option value="0">Все кинотеатры</option>
	  			<option value="1">Кинотеатр 1</option>
	  			<option value="2">Кинотеатр 2</option>
			</select>

		</div>

		<div class="calendar-list">
			<form class="radio-btn">
			<div class="wight-position">
				<input id="radio-1" type="radio" name="radio" value="1" checked>
				<label for="radio-1"><? echo "<p>" . date("j M D") . "</p>"; ?></label></div>
			<div class="wight-position">
				<input id="radio-2" type="radio" name="radio" value="2">
				<label for="radio-2"><? echo "<p>" . date("j M D", strtotime("+1 day")) . "</p>"; ?></label></div>
			<div class="wight-position">
				<input id="radio-3" type="radio" name="radio" value="3">
				<label for="radio-3"><? echo "<p>" . date("j M D", strtotime("+2 day")) . "</p>"; ?></label></div>
			<div class="wight-position">
				<input id="radio-4" type="radio" name="radio" value="4">
				<label for="radio-4"><? echo "<p>" . date("j M D", strtotime("+3 day")) . "</p>"; ?></label></div>
			<div class="wight-position">
				<input id="radio-5" type="radio" name="radio" value="5">
				<label for="radio-5"><? echo "<p>" . date("j M D", strtotime("+4 day")) . "</p>"; ?></label></div>
			<div class="wight-position">
				<input id="radio-6" type="radio" name="radio" value="6">
				<label for="radio-6"><? echo "<p>" . date("j M D", strtotime("+5 day")) . "</p>"; ?></label></div>
			<div class="wight-position">
				<input id="radio-7" type="radio" name="radio" value="7">
				<label for="radio-7"><? echo "<p>" . date("j M D", strtotime("+6 day")) . "</p>"; ?></label></div>
			</form>
		</div>
	</div>
</section>

<section>
	<div class="container">

		<?
		$films = R::findAll('films');
		foreach($films as $value)
  		{
  			echo '
		  		<div class="card wight-position mr-30 mb-30 w-22">
		  			<a href="#"><img src="'.$value->poster.'" class="card-img-top" alt="..."></a>
		  			<div class="card-body">
		    			<h5 class="card-title">'.$value->title.'</h5>
		  			</div>
		  			<hr>
		  			<form action="../page-select-movie/select-movie.php" method="GET">
		  			<input value="'.$value->id.'" type="" name="film_id" class="d-none">
		  			<button class="w-100 btn btn-primary">Купить билет</button>
		  			</form>
				</div>
  			';
  		}
		?>
<form action="" method=""></form>
	</div>
	<div style="clear: both;"></div>
</section>
<? require "../templates/footer.php" ?>
</body>
</html>