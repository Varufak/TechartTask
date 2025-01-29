<?php
	$doDrawHeaderLine = true;
	include("../layout/header.php");
?>
<script src="/scripts/detailNews.js"></script>
<div class="breadcrumbs container">
	<a class="breadcrumbs__main" href="/">Главная</a>
	<span class="breadcrumbs__this"></span>
</div>
<h1 class="news-detail-title container h1"></h1>
<div class="news-detail container">
	<div class="news-detail-content">
		<div class="news-detail-content__date news__date"></div>
		<h2 class="news-detail-content__announce h2"></h2>
		<div class="news-detail-content__content"></div>
		<a href="/" class="news-detail-content__button">
			<?php
				include("../media/Arrow 1.svg")
			?>
		НАЗАД К НОВОСТЯМ</a>
	</div>
	<img src="" class="news-detail-img">
</div>
<?php
	include("../layout/footer.php");
?>
