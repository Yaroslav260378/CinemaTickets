<? require "../templates/header.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title><? echo $_SESSION['logged_user']->name; ?></title>
</head>
<script src="/page-cabinet/jquery.maskedinput.js"></script>

<? 
$data = $_POST;
$user = R::load('user', $_SESSION['logged_user']->id);
if($user->level == 1){
	$level="Пользователь";
} else if($user->level == 2)
{
	$level="Администратор";
}

if($user->number_phone == '')
{
	$phone='<p class="d-inline">Номер телефона: <form method="POST" class="d-inline" id="f_add_phone"><input id="text1" type="text" placeholder="066123456" name="input_phone" class="border-input"><button type="submit" id="add_phone_number" class="ml-10">Добавить</button></form></p>';
} else $phone='<p>Номер телефона: '.$user->number_phone.'</p>';
?>

<body class="back-gray">
<section class="back-white h-80">
	<div class="container">
		<h3 class="text-center pt-20">Кабинет пользователя</h3>
	</div>
</section>
<section class="container">
	<div class="wight-position w-50 p-25">
		<h5 class="text-center mb-30">Основная информация</h5>
		<p>Ваш уникальный номер: <span id="user_id"><? echo $_SESSION['logged_user']->id; ?></span></p>
		<p>Имя: <? echo $_SESSION['logged_user']->name; ?></p>
		<p>Email: <? echo $_SESSION['logged_user']->email; ?></p>
		<? echo $phone; ?>
		<p>Уровень аккаунта: <?  echo $level ?></p>
		<p>Дата регистрации: <? echo $_SESSION['logged_user']->time_registration; ?></p>
	</div>

	<div class="wight-position p-25 w-50">
		<h5 class="text-center mb-30">Дополнительные опции</h5>
		<? if($user->level == 2){echo "<a href='../page-admin/admin.php' class='d-block mx-auto w-231 text-decoration-none text-success mx-auto'><h5 class='mb-30'>Панель администратора</h5></a>";} ?>
		<a href="../lib/logout.php" class="btn btn-logout mx-auto">Выйти из аккаунта</a>
	</div>
</section>
<div style="clear: both;"></div>
<div class="mt-200"></div>
<? require "../templates/footer.php" ?>
<script src="https://unpkg.com/imask"></script>
</body>
</html>

<script type="text/javascript">
	
	$(function()
	{
		$('#f_add_phone').submit(function(form){
			form.preventDefault();
			var data = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "add_phone.php",
				data: data,
				success: function(result){
					$('#f_add_phone').html(result);
				}
			});
		});
	});
	

	$('#text1').on('keyup',function(){
	  var $this = $(this),
	      val = $this.val();
	  
	  if(val.length >= 1){
	    $('#add_phone_number').show(100);
	  }else {
	    $('#add_phone_number').hide(100);
	  }
	});
</script>

<script>
var elements = document.getElementById('f_add_phone');
for (var i = 0; i < elements.length; i++) {
  new IMask(elements[i], {
    mask: '+{38}(000)000-00-00',
  });
}
</script>