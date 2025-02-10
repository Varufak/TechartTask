<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= $styles ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<header class="container">
		<img src="/media/logo.png" class="logo">
		<div class="menu">
			<a class="menu__main menu-text" href="/">Главная</a>
			<span class="devider">|</span>
			<a class="menu__list menu-text" href="/news/">Новости</a>
		</div>
	</header>
	<?= $doDrawHeaderLine === true ? "<hr class='underline'>" : "" ?>
<?php echo $content ?>
	<footer class="container">
		<div class="copyright">© 2023 — 2412 «Галактический вестник»</div>
	</footer>	
</body>
</html>
