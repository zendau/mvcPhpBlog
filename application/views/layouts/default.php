<?php //$_SESSION['authorize']['id'] = 1;
	//$_SESSION['admin'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../../public/style/style.css">
	<link rel="stylesheet" href="../../../public/style/slick.css">
	<link rel="stylesheet" href="../../../public/style/slick-theme.css">
	<link rel="stylesheet" href="../../../public/style/slider.css">
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
</head>
<body>
    <header class="main-header container">
        <nav class="menu wrapper">
            <li class="menu-container">
				<ul class="menu-item"><a href="/">Главная</a></ul>
                <ul class="menu-item"><a href="/user/news/1">Новости</a></ul>
				<ul class="menu-item"><a href="/" class="menu-logo"></a></ul>
				<?php if(isset($_SESSION['admin'])): ?>
				<ul class="menu-item"><a href="/user/choice">Заказать тур</a></ul>  
				<ul class="menu-item"><a href="/admin/users">Перейти в админку</a></ul>
				<?php elseif(isset($_SESSION['authorize']['id'])): ?>
				<ul class="menu-item"><a href="/user/choice">Заказать тур</a></ul>  
				<ul class="menu-item"><a href="/user/logout">Выход</a></ul>
				<?php else: ?>
				<ul class="menu-item"><a id="login" href="#">Вход</a></ul>  
				<ul class="menu-item"><a href="/user/reg">Регистрация</a></ul>
				<?php endif; ?>
            </li>
        </nav>
    </header>
	<?php echo $content; ?>
    <div class="overlay"></div>

    <form action="/" method='post' class="section-login">
		<h3 class="section-login__title">Вход в личный кабинет</h3>
		<p class="section-login__text">Введите свой логин и пароль, чтобы войти</p>
		<div class="section-login__login"><input class="section-login__input" type="text" name='login' placeholder="Логин"></div>
		<div class="section-login__password"><input class="section-login__input" type="password" name='pass' placeholder="Пароль"></div>
		<div class="section-login__flex-container">
			<a href="/user/reg" class="section-login__reg">Создать аккаунт</a>
			<a href="#" class="section-login__reset">Я забыл пароль!</a>
		</div>
		<button class="section-login__auth btn">Войти в лийный кабинет</button>
		<btn class="section-login__close"></btn>
	</form>
	
	<form action="/" method="post" class="section-reset">
            <h3 class="section-reset__title">Восстановление пароля</h3>
            <p class="section-reset__text">Введите свою почту что бы восстановить пароль</p>
            <div class="section-reset__email"><input class="section-reset__input" type="email" name="email" placeholder="Почта"></div>
            <button type="submit" href="#" class="section-reset__auth btn">Восстановить пароль</button>
            <btn class="section-reset__close"></btn>
    </form>

    <footer class="footer wrapper">
        <p class="footer-adress">Офис на <br> проспекте 6</p>
        <div class="footer-social">
            <a href="https://twitter.com/" class="social-item social_tw"></a>
            <a href="https://www.facebook.com/" class="social-item social_fb"></a>
            <a href="http://youtube.com/" class="social-item social_yt"></a>
        </div>
        <p class="footer-dev">Сайт разработал <br> Ковалёв А.Н. СКС-18</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../../../public/js/jquery.maskedinput.min.js"></script>
	<script src="../../../public/js/jquery.validate.min.js"></script>
	<script src="../../../public/js/slick.min.js"></script>
	<script src="../../../public/js/form.js"></script>
    <script src="../../../public/js/script.js"></script>
</body>
</html>