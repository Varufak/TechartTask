<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="banner">
	<img class="banner__img" src="/media/<?= $lastItem["image"] ?>">
	<div class="banner__img gradient"></div>
	<div class="banner__content container">
		<h2 class="banner__title h1"><?= $lastItem["title"] ?></h2>
		<p class="banner__text"><?= strip_tags($lastItem["announce"]) ?></p>
	</div>
</div>
<h1 class="title h1 container">Новости</h1>
<div class="content container">
	<?php foreach ($news as $row) { ?>
		<a class="news" href="/news/<?= $row["id"] ?>/">
			<div class="news__date"><?= date("d.n.o", strtotime($row["date"])) ?></div>
			<h3 class="news__title h2"><?= $row["title"] ?></h3>
			<p class="news__announce"><?= strip_tags($row["announce"]) ?></p>
			<button class="news__button">ПОДРОБНЕЕ
				<?php include("./media/Arrow1.svg"); ?>
			</button>
		</a>
	<?php } ?>
</div>
<div class="pagination container">
	<?php if($currentPage > 1) { ?>
		<a class="pagination__button pagination__next-button rotate-button" href="/news/page-<?= $currentPage - 1?>/">
			<img src="/media/PaginationArrow.svg"/>
		</a>
	<?php } ?>
	<?php for ($i = $paginationCond - 1; $i <= $paginationCond + 1; $i++) { ?>
		<a class="pagination__button <?= $currentPage == $i ? "fill-color" : "" ?>" href="/news/page-<?= $i ?>/"><?= $i ?></a>
	<?php } ?>
	<?php if($currentPage < $pagesCount) { ?>
		<a class="pagination__button pagination__next-button" href="/news/page-<?= $currentPage + 1?>/">
			<img src="/media/PaginationArrow.svg"/>
		</a>
	<?php } ?>
</div>
<?php
	include __DIR__ . "/../layout/footer.php";
?>