<?php
	$doDrawHeaderLine = false;

	include __DIR__ . "/autoload.php";
	include("./layout/header.php");

	use Models\NewsModel as NewsModel;

	const NEWS = 4;

	$lastItem = NewsModel::getLastRow();

	$currentPage = $_GET['page'] ?? 1;

	$newsCount = NewsModel::getCount();
	$pagesCount = ceil($newsCount / NEWS);
	$offset = ($currentPage - 1) * NEWS;
	$news = NewsModel::getRows($offset, NEWS);
?>
<div class="banner">
	<img class="banner__img" src="../media/<?= $lastItem["image"] ?>">
	<div class="banner__img gradient"></div>
	<div class="banner__content container">+
		<h2 class="banner__title h1"><?= $lastItem["title"] ?></h2>
		<p class="banner__text"><?= strip_tags($lastItem["announce"]) ?></p>
	</div>
</div>
<h1 class="title h1 container">Новости</h1>
<div class="content container">
	<?php foreach ($news as $row) { ?>
		<a class="news" href="detail.php?id=<?= $row["id"] ?>">
			<div class="news__date"><?= date("d.n.o", strtotime($row["date"])) ?></div>
			<h3 class="news__title h2"><?= $row["title"] ?></h3>
			<p class="news__announce"><?= strip_tags($row["announce"]) ?></p>
			<button class="news__button">ПОДРОБНЕЕ
				<?php include("./media/Arrow1.svg"); ?>
			</button>
		</a>
	<?php } ?>
</div>
<?php
	$paginationCondition;
	switch ($currentPage) {
		case 1:
			$paginationCond = $currentPage + 1;
			break;
		case $pagesCount:
			$paginationCond = $currentPage - 1;
			break;
		default:
			$paginationCond = $currentPage;
			break;
	}
?>
<div class="pagination container">
	<?php if($currentPage > 1) { ?>
		<a class="pagination__button pagination__next-button rotate-button" href="?page=<?= $currentPage - 1?>">
			<img src="/media/PaginationArrow.svg"/>
		</a>
	<?php } ?>
	<?php for ($i = $paginationCond - 1; $i <= $paginationCond + 1; $i++) { ?>
		<a class="pagination__button <?= $currentPage == $i ? "fill-color" : "" ?>" href="?page=<?= $i ?>"><?= $i ?></a>
	<?php } ?>
	<?php if($currentPage < $pagesCount) { ?>
		<a class="pagination__button pagination__next-button" href="?page=<?= $currentPage + 1?>">
			<img src="/media/PaginationArrow.svg"/>
		</a>
	<?php } ?>
</div>
<?php
	include("./layout/footer.php");
?>
