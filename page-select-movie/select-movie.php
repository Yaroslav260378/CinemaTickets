<? require "../templates/header.php" ?>
<? 
$data = $_GET; 
$film = R::load('films', $data['film_id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title><? echo $film->title; ?></title>
</head>
<body class="back-gray">

<section class="back-white h-500">
	<div class="container pt-20 select-movie">
		<div class="wight-position">
			<h3 class="text-center"><? echo $film->title; ?></h3>
			<img src="<? echo $film->poster; ?>" alt="...">
		</div>

		<div class="wight-position pl-60 pt-51">
			<small>Год</small>
			<p><? echo $film->year; ?></p>
			<small>Страна</small>
			<p><? echo $film->country; ?></p>
			<small>Язык</small>
			<p><? echo $film->lang; ?></p>
			<small>Жанр</small>
			<p><? echo $film->genre; ?></p>
			<small>Продолжительность</small>
			<p><? echo $film->duration; ?></p>
			<small>Прокат</small>
			<p><? echo $film->rental; ?></p>
		</div>

		<div class="pl-60 pt-51 iframe float-right">
			<h4>Трейлер</h4>
			<div class="embed-responsive embed-responsive-16by9">
  				<iframe class="embed-responsive-item br-30" src="<? echo $film->trailer; ?>" allowfullscreen></iframe>
			</div>
		</div>

	</div>
</section>

<section>
	<div class="container">
		
		<div class="cinemateaters mt-20 pl-30 br-30">
			<div>
				<span>PlanetaKino IMAX</span>
				<span>Харьков</span>

				<div class="pb-15">
					<div class="w-85 wight-position"><span>ВТ 31.03</span></div>
					<button class="seans-time wight-position ml-10 br-30" data-toggle="modal" data-target="#ModalCenter">
					<p class="text-center">13:30</p>
					</button>
					<div style="clear: both;"></div>
				</div>

			</div>
		</div>

	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCenterTitle">Покупка билета</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body noselect">
        <div class='cinemaHall zal1 pl-60'></div>
        <div class='result'></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<? require "../templates/footer.php" ?>
</body>
</html>





<script type="text/javascript">
	// план зала по рядам общая вместительность 300 мест
// планов может быть и больше... и разные...
var cinemaHall1 = {
    row: [10, 20, 30, 30, 30, 30, 30, 30, 30, 30, 30]
  },
  cinemaHallMap = '<div class="screen"><p class="mb-0">Screen</p></div>';
$.each(cinemaHall1.row, function(row, numberOfSeats) {
  cinemaHallRow = '';
  for (i = 1; i <= numberOfSeats; i++) {
    // собираем ряды
    cinemaHallRow += '<div class="seat" data-row="' +
      (row+1) + '" data-seat="' +
      i + '">&nbsp;</div>';
  }
  //собираем зал с проходами между рядами
  cinemaHallMap += cinemaHallRow + '<div class="passageBetween">&nbsp;</div>';
});

//заполняем в html зал номер 1
$('.zal1').html(cinemaHallMap);
// тут по клику определяем что место выкуплено
$('.seat').on('click', function(e) {
  // если первый раз кликнули билет выкупили, 
  // если повторно значит вернули билет
  $(e.currentTarget).toggleClass('bay');
  //показываем сколько билетов выкуплено
  showBaySeat();
});

function showBaySeat() {
  result = '';
  //ищем все места купленные и показываем список выкупленных мест
  $.each($('.seat.bay'), function(key, item) {
    result += '<div class="ticket">Ряд: ' +
      $(item).data().row + ' Место:' +
      $(item).data().seat + '</div>';
  });

  $('.result').html(result);
}
</script>