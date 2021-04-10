<? require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php' ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Кодировка веб-страницы -->
    <meta charset="utf-8">
    <!-- Настройка viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Подключаем Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css" >

    <link rel="stylesheet" href="../CSS/main.css" >
</head>

<body>
<header class="menu_background">
			<div class="container">
				<p class="logo"><a href="../index.php" ><span>S</span>ale<span>T</span>ickets</a></p>
				<nav class="menu_nav">
					<ul class="menu">
						<li>
							<a href="/page-afisha/afisha.php"><p>Афиша</p></a>
						</li>
						<li>
							<a href="/page-kinoteaters/kinoteaters.php"><p>Кинотеатры</p></a>
						</li>
						<li>
							<a href="/page-FAQ/faq.php"><p>FAQ</p></a>
						</li>
						<li>
							<a href="/page-contact/contact.php"><p>Контакты</p></a>
						</li>
						<li>
							<? 
							if(isset($_SESSION['logged_user']))
							{
								echo '<a href="/page-cabinet/cabinet.php"><p>'.$_SESSION['logged_user']->name.'</p></a>';
							}else
							{
								echo '<a href="/page-login/login.php"><p>Кабинет пользователя</p></a>';
							}
							?>
						</li>
					</ul>
				</nav>
			</div>
</header>

	<!-- Подключаем jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Подключаем Bootstrap JS -->    
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>