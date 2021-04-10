<? require "../templates/header.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
</head>

<body class="back-gray">

<section class="back-white h-80">
	<div class="container">
		<h3 class="text-center pt-20">Авторизация</h3>
	</div>
</section>

<?php

$data = $_POST;
$errors = array();
if( isset($data['do_login']) )
{
	$user = R::findOne('user', 'email = ?', array($data['email']) );

			if( $user ) {
					//логин существует
				if( password_verify($data['password'], trim($user->password)) )
				{
					//Логиним пользователя

					$_SESSION['logged_user'] = $user;

					?>
					<script type="text/javascript">
					window.location = "../page-cabinet/cabinet.php"
					</script>
					<? 

				} else
				{
					$errors[] = 'Неверный пароль';
				}

				} else
				{	
					$errors[] = 'Пользователь с таким E-mail не найден';
				}

				if( !empty($errors) )
				{
					echo '<div id="errors" class="text-center text-danger">' .array_shift($errors).  '</div>';
				}
			}
?>

<section>
	<div class="container pt-20">
		<form class="w-35 mx-auto" method="POST">
			 <div class="form-group">
			    <label for="inputEmail">Email адрес*</label>
			    <input required type="email" class="form-control br-30" id="inputEmail" aria-describedby="emailHelp" name="email" value="<?php echo @$data['email']; ?>">
			 </div>

			 <div class="form-group">
			    <label for="inputName">Пароль*</label>
			    <input required type="password" class="form-control br-30" id="inputName" name="password" value="<?php echo @$data['password']; ?>">
			 </div>

      			<button type="submit" class="reg-btn" name="do_login">Авторизоваться</button>
      			<a href="/page-register/register.php" class="login-link">Регистрация</a>

		</form>

	</div>
</section>
<div class="mt-200"></div>
<? require "../templates/footer.php" ?>
</body>
</html>