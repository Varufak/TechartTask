<?php
	$title = "Главная"
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="/styles/styles.css">
</head>
<body>
	<header <?=$doDrawHeaderLine === true ? 'class="underline"' : ''?>>
		<img src="/media/logo.png" class="logo">
	</header>