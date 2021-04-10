<? require "../templates/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Кинотеатры</title>
</head>
<body class="back-gray">

<section class="back-white h-80 mb-30">
	<div class="container">
		<div class="top-panel">
			<form class="radio-btn">
				<div>
					<input id="radio-1" type="radio" name="radio" value="1" checked>
					<label for="radio-1" class="w-100 rounded-top">Список</label>
				</div>
				<div>
					<input id="radio-2" type="radio" name="radio" value="2">
					<label for="radio-2" class="w-100 rounded-top">Избранное</label>
				</div>
			</form>
		</div>
	</div>
</section>
<section>
	<div class="container">
		
		<?
		$cinemas = R::findAll('cinemas');
		foreach($cinemas as $value)
  		{
     		echo '
		     	<div class="card card-cinema wight-position">
					<div class="under-card">
							<div class="wight-position w-25">
		  						<img src="'.$value->icon.'" class="card-img-top" alt="...">
		  					</div>
		  					<div class="card-body wight-position p-0 w-50">
		    					<a href="#"><h5 class="card-title">'.$value->name.'</h5></a>
		    					<p class="pl-10">'.$value->adress.'</p>
		  					</div>
		  					<div class="check-btn">
		  						<label><input type="checkbox">
		  						<span>Favorite</span></label>
		  					</div>
					</div>
				</div>
     		';
  		}
		 ?>


	</div>
</section>

<div style="clear: both;"></div>
<div class="mt-200"></div>
<? require "../templates/footer.php" ?>
</body>
</html>