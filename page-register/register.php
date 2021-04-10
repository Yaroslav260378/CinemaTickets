<? require "../templates/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>


<?php

	$data = $_POST;
	$errors = array();
	if( isset($data['do_signup']) )
	{
		//Здесь регистрируем

		if( trim($data['name']) == '' )
		{
			$errors[] = 'Введите Имя';
		}

		if( ($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		if( $data['password2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно';
		}

		if( R::count('user', "email = ?", array($data['email'])) > 0  )
		{
			$errors[] = 'Пользователь с таким Email уже существует';
		}



?>


<body class="back-gray">

<section class="h-80 back-white">
	<div class="container">	
		<h3 class="pt-20 text-center">Регистрация нового пользователя</h3>
	</div>
</section>

<section>
	<? 
				if( empty($errors) )
			{
				//Можно регистрировать
				$user = R::dispense(user);
				$user->email = $data['email'];
				$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
				$user->name = $data['name'];
				$user->number_phone = $data['number_phone'];
				R::store($user);
				echo '<div class="text-center text-success" id="errors"><strong>Регистрация прошла успешно. Спасибо что присоеденились к нам: ' . $user->name .'</strong></div>';

			} else {
				echo '<div class="text-center text-danger" id="errors"><strong>' .array_shift($errors).  '</strong></div>';
			}
		}
	?>
	<div class="container pt-20">
		<form class="w-35 mx-auto" method="POST">
			<div class="form-group">
			    <label for="inputName">Ваше имя*</label>
			    <input required class="form-control br-30" id="inputName" placeholder="Например: Иван" name="name" value="<?php echo @$data['name']; ?>">
			 </div>

			 <div class="form-group">
			    <label for="inputEmail">Email адрес*</label>
			    <input required type="email" class="form-control br-30" id="inputEmail" aria-describedby="emailHelp" placeholder="name@example.com" name="email" value="<?php echo @$data['email']; ?>">
			    <small id="emailHelp" class="form-text text-muted">Мы никому не передадим вашу почту.</small>
			 </div>

			 <div class="form-group">
			    <label for="inputPhone">Номер телефона</label>
			    <input class="form-control br-30" id="inputPhone" pattern="^[ 0-9]+$" placeholder="Например: 380661234567" maxlength="12" minlength="10" name="number_phone" value="<?php echo @$data['number_phone']; ?>">
			 </div>

			 <div class="form-group">
			    <label for="inputName">Пароль*</label>
			    <input required type="password" class="form-control br-30" id="inputPassword" name="password" value="<?php echo @$data['password']; ?>">
			 </div>

			 <div class="form-group">
			    <label for="inputName">Пароль еще раз*</label>
			    <input required type="password" class="form-control br-30" id="inputPassword" name="password2" value="<?php echo @$data['password2']; ?>"> 
			 </div>


      			<button type="submit" class="reg-btn" name="do_signup">Регистрация</button>
      			<a href="/page-login/login.php" class="login-link">Авторизоваться</a>

		</form>

	</div>
</section>
<div class="mt-200"></div>
<? require "../templates/footer.php" ?>
</body>
</html>