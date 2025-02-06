<?php
	
	namespace Controllers;
	
	use Models\NewsModel as NewsModel;
	use Controllers\Controller;

	const NEWS = 4;
	
	class NewsController extends Controller
	{
		public function actionList($page)
		{
			$doDrawHeaderLine = false;
			$title = "Новости";


			$lastItem = NewsModel::getLastRow();

			$currentPage = $page;

			$newsCount = NewsModel::getCount();
			$pagesCount = ceil($newsCount / NEWS);
			$offset = ($currentPage - 1) * NEWS;
			$news = NewsModel::getRows($offset, NEWS);

			if ($page > $pagesCount) {
				$this->notFound();
			}

			$paginationCond;
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

			include __DIR__ . "/../../views/news/newsList.php";
		}
		public function actionDetail($id)
		{
			$doDrawHeaderLine = true;

			if ($id > NewsModel::getCount()) {
				$this->notFound();
			}

			$currentId = $id;
			$currentNews = NewsModel::getItem($currentId);

			$title = $currentNews['title'];
			include __DIR__ . "/../../views/news/newsDetail.php";
		}
	}
