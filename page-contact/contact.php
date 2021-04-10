<?	require "../templates/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Контакты</title>
	<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
</head>
<body class="back-gray">

<section class="h-80 back-white">
	<div class="container">
		<div class="top-panel">
			<form class="radio-btn">
				<div>
					<input id="radio-1" type="radio" name="radio" onclick="changeContent(this);" value="1" checked>
					<label for="radio-1" class="w-100 rounded-top noselect">Контакты</label>
				</div>
				<div>
					<input id="radio-2" type="radio" name="radio" onclick="changeContent(this);" value="2">
					<label for="radio-2" class="w-100 rounded-top noselect">Вакансии</label>
				</div>
			</form>
		</div>
	</div>
</section>

<section>
	<div class="container pt-20">
		
<div class="col p-0">
  <div class="col p-0">
    <div class="collapse multi-collapse show" id="multiCollapseExample1">
      <div class="card card-body">
      	<h3>Контакты</h3>
        <h5 class="ta-left">Наши офисы:</h5>
        <div>
         	<button type="button" id="office_1" class="btn-office mt-10">Главный офис: г.Харьков, ул.Дудинской, 1А "КЛАСС"</button>
         	<p id="of_1"></p>
        </div>
        <div>
        	<button type="button" id="office_2" class="btn-office mt-10">Офис №2: г.Харьков, ул.Сумская, 10 "AVE PLAZA"</button>
        	<p id="of_2"></p>
        </div>
        <div>
        	<button type="button" id="office_3" class="btn-office mt-10">Офис №3: г.Киев, ул.Площадь Независимости, 1 ТЦ"GLOBUS"</button>
        	<p id="of_3"></p>
        </div>
        <div id="map" class="mt-20" style="height:400px"></div>
      </div>
    </div>
  </div>

  <div class="col p-0">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
      	<h3>Вакансии</h3>
        Здесь можно добавлять вакансии...
      </div>
    </div>
  </div>
</div>

	</div>
</section>
<div style="clear: both;"></div>

<div class="h-200"></div>
<? require "../templates/footer.php" ?>

<script>
	var radio = document.formChangeContent.radio;
	function changeContent(radios)
	{
		if(radios.value == 1)
		{
			document.getElementById("multiCollapseExample1").className = "collapse multi-collapse show";
			document.getElementById("multiCollapseExample2").className = "collapse multi-collapse";
		} else if(radios.value == 2) 
		{
			document.getElementById("multiCollapseExample1").className = "collapse multi-collapse";
			document.getElementById("multiCollapseExample2").className = "collapse multi-collapse show";
		}
	}
</script>
</body>
</html>

<script type="text/javascript">
    var map;

    DG.then(function () {
        map = DG.map('map', {
            center: [49.980828, 36.178078],
            zoom: 17
        });
        marker1 = DG.marker([49.980828, 36.178078]).addTo(map);
        marker2 = DG.marker([49.9944284,36.2328544]).addTo(map);
        marker3 = DG.marker([50.4510745,30.5225806]).addTo(map);

        group = DG.featureGroup([marker1, marker2, marker3]);
        group.addTo(map);

        group.on('click', function(e) {
                    map.setView([e.latlng.lat, e.latlng.lng]);
                });
    });

    office_2.onclick = function() {
    	$('#of_1').html("");
    	$('#of_2').html("");
    	map.setView([49.9944284, 36.2328544]);
    	map.setZoom(17);

    	$.ajax({
				type: "POST",
				url: "get_info.php",
				data: {id:2},
				success: function(result){
					$('#of_2').html(result);
				}
			});
	}

	office_1.onclick = function() {
    	$('#of_2').html("");
    	$('#of_3').html("");
    	map.setView([49.980828, 36.178078]);
    	map.setZoom(17);

    	$.ajax({
				type: "POST",
				url: "get_info.php",
				data: {id:1},
				success: function(result){
					$('#of_1').html(result);
				}
			});
	}

	office_3.onclick = function() {
    	$('#of_2').html("");
    	$('#of_1').html("");
    	map.setView([50.4510745, 30.5225806]);
    	map.setZoom(17);

    	$.ajax({
				type: "POST",
				url: "get_info.php",
				data: {id:3},
				success: function(result){
					$('#of_3').html(result);
				}
			});
	}
</script>

<!-- 49.980828, 36.178078 КЛАСС
	 49.9944284,36.2328544 AVE PLAZA
	 50.4510745,30.5225806 GLOBUS
-->

