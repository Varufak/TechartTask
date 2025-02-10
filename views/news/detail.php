<div class="breadcrumbs container">
	<a class="breadcrumbs__main" href="/news/">Главная</a>
	<span class="breadcrumbs__this">/ <?= $currentNews["title"] ?></span>
</div>
<h1 class="news-detail-title container h1"><?= $currentNews["title"] ?></h1>
<div class="news-detail container">
	<div class="news-detail-content">
		<div class="news-detail-content__date news__date"><?= date("d.n.o", strtotime($currentNews["date"])) ?></div>
		<h2 class="news-detail-content__announce h2"><?= $currentNews["announce"] ?></h2>
		<div class="news-detail-content__content"><?= $currentNews["content"] ?></div>
		<a href="/news/" class="news-detail-content__button">
			<?php include("./media/Arrow1.svg"); ?>
		НАЗАД К НОВОСТЯМ</a>
	</div>
	<img src="/media/<?= $currentNews["image"] ?>" class="news-detail-img">
</div>
