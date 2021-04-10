<? require "/templates/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>

	<link rel="stylesheet" href="../CSS/main.css" >
</head>

<body class="back-gray">


<section>
	<center><h2 class="now_on_screen funny-title section-title">Сейчас в кино</h2></center>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators btn_slider_pos_top">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active round_btn"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="round_btn"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="round_btn"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active img-cover-carousel">
      <img src="./img/1.png" class="d-block w-100 " alt="...">
      <div class="carousel-caption d-none d-md-block stroke">
        <a href="" class="stretched-link"><h5><span>Ч</span>удо-Женщина</h5></a>
        <p>В кино с 5 июня.</p>
      </div>
    </div>

    <div class="carousel-item img-cover-carousel">
      <img src="./img/2.png" class="d-block w-100 " alt="Ошибка изображения.">
      <div class="carousel-caption d-none d-md-block stroke">
        <a href="" class="stretched-link"><h5><span>С</span>оник</h5></a>
        <p>В кино с 9 августа.</p>
      </div>
    </div>

    <div class="carousel-item img-cover-carousel">
      <img src="./img/3.png" class="d-block w-100 " alt="Ошибка изображения.">
      <div class="carousel-caption d-none d-md-block stroke">
        <a href="" class="stretched-link"><h5><span>Х</span>ищные птицы</h5></a>
        <p>В кино с 7 февраля.</p>
      </div>
    </div>

  </div>

</div>

</section>

<section class="h-500">
	<br>
	<table class="w-100 container" cellpadding="5">
  <tr>
    <th class="w-50"><center><h3>Почему мы?</h3></center></th>
    <th class="w-50"><center><h3>Наши партнеры</h3></center></th>
  </tr>

  <tr class="w-100">
    <th class="w-50"><p class="font-weight-normal">&nbsp;&nbsp;&nbsp;Продажа билетов представлена на сайте saleticket.ua для всех поклонников киноиндустрии. Для Вас удобная и регулярно обновляющаяся афиша всех новинок кино 2020 года. Здесь Вы сможете узнать, какие фильмы сегодня в прокате. Краткие анонсы фильмов заинтригуют, но не раскроют весь сюжет киноленты, чтобы зритель смог получить полноценное удовольствие от просмотра. Все сеансы в кинотеатрах подробно расписаны, чтобы Вы всегда могли выбрать подходящее время для просмотра фильма.</p></th>

    <th class="w-50">
    	<table class="w-100 h-100 table-image">
    		<tr>
    			<th><img src="./img/partners/1.png"></th>
    			<th><img src="./img/partners/2.png"></th>
    			<th><img src="./img/partners/3.png"></th>
    		</tr>

    		<tr>
    			<th><img src="./img/partners/4.png"></th>
    			<th><img src="./img/partners/5.png"></th>
    			<th></th>
    		</tr>
    	</table>
    </th>

  </tr>

</table>
<div class="vl"></div>
</section>

<? require "./templates/footer.php" ?>
</body>
</html>

  <script>
    var multiItemSlider = (function () {
      return function (selector, config) {
        var
          _mainElement = document.querySelector(selector), // основный элемент блока
          _sliderWrapper = _mainElement.querySelector('.slider__wrapper'), // обертка для .slider-item
          _sliderItems = _mainElement.querySelectorAll('.slider__item'), // элементы (.slider-item)
          _sliderControls = _mainElement.querySelectorAll('.slider__control'), // элементы управления
          _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width), // ширина обёртки
          _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width), // ширина одного элемента    
          _positionLeftItem = 0, // позиция левого активного элемента
          _transform = 0, // значение транфсофрмации .slider_wrapper
          _step = _itemWidth / _wrapperWidth * 100, // величина шага (для трансформации)
          _items = []; // массив элементов
        // наполнение массива _items
        _sliderItems.forEach(function (item, index) {
          _items.push({ item: item, position: index, transform: 0 });
        });

        var position = {
          getMin: 0,
          getMax: _items.length - 1,
        }

        var _transformItem = function (direction) {
          if (direction === 'right') {
            if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) >= position.getMax) {
              return;
            }
            if (!_sliderControlLeft.classList.contains('slider__control_show')) {
              _sliderControlLeft.classList.add('slider__control_show');
            }
            if (_sliderControlRight.classList.contains('slider__control_show') && (_positionLeftItem + _wrapperWidth / _itemWidth) >= position.getMax) {
              _sliderControlRight.classList.remove('slider__control_show');
            }
            _positionLeftItem++;
            _transform -= _step;
          }
          if (direction === 'left') {
            if (_positionLeftItem <= position.getMin) {
              return;
            }
            if (!_sliderControlRight.classList.contains('slider__control_show')) {
              _sliderControlRight.classList.add('slider__control_show');
            }
            if (_sliderControlLeft.classList.contains('slider__control_show') && _positionLeftItem - 1 <= position.getMin) {
              _sliderControlLeft.classList.remove('slider__control_show');
            }
            _positionLeftItem--;
            _transform += _step;
          }
          _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
        }

        // инициализация
        _setUpListeners();

        return {
          right: function () { // метод right
            _transformItem('right');
          },
          left: function () { // метод left
            _transformItem('left');
          }
        }

      }
    }());

    var slider = multiItemSlider('.slider')

  </script>