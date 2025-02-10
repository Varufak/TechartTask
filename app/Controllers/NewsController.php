<?php

namespace Controllers;

use Models\NewsModel as NewsModel;
use Controllers\Controller;
use Scss;

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
		$this->render("news/list", [
			"styles" => Scss::getCompiledPath("styles.scss"),
			"news" => $news,
			"title" => $title,
			"lastItem" => $lastItem,
			"doDrawHeaderLine" => $doDrawHeaderLine,
			"paginationCond" => $paginationCond,
			"currentPage" => $currentPage,
			"pagesCount" => $pagesCount
		]);
	}
	public function actionDetail($id)
	{
		$doDrawHeaderLine = true;

		if ($id > NewsModel::getCount()) {
			$this->notFound();
		}

		$currentNews = NewsModel::getItem($id);

		$title = $currentNews['title'];
		$this->render("news/detail", [
			"styles" => Scss::getCompiledPath("styles.scss"),
			"title" => $title,
			"doDrawHeaderLine" => $doDrawHeaderLine,
			"currentNews" => $currentNews
		]);
	}
}
