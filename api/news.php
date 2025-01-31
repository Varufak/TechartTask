<?php
include "./app/DBConnect/init.php";

class News
{
	private $conn;
	public function __construct()
	{
		$this->conn = DB::getConnection();
	}
	public function getData()
	{
		$lastNews = $this->getLastNews();
		$pagesCount = $this->getPagesCount();
		$news = $this->getNews();
		$data = ['last' => $lastNews, 'count' => $pagesCount, 'data' => $news];
		return $data;
	}
	public function printData($data)
	{
		echo json_encode($data);
	}
	private function getLastNews()
	{
		$lastNewsQuery = $this->conn->prepare('SELECT title, announce, image FROM news ORDER BY date DESC LIMIT 1');
		$lastNewsQuery->execute();
		$lastNews = $lastNewsQuery->fetch(PDO::FETCH_ASSOC);

		return $lastNews;
	}
	private function getPagesCount()
	{
		$newsCountQuery = $this->conn->prepare('SELECT COUNT(*) FROM news');
		$newsCountQuery->execute();
		$count = $newsCountQuery->fetchColumn();

		return $count;
	}
	private function getNews()
	{
		$pageNumber = $_GET['page'] ?? 1;
		$offset = ($pageNumber - 1) * 4;
		$newsQuery = $this->conn->prepare('SELECT id, date, title, announce FROM news ORDER BY date DESC LIMIT 4 OFFSET :offset');
		$newsQuery->bindParam(':offset', $offset, PDO::PARAM_INT);
		$newsQuery->execute();
		$news = [];
		foreach ($newsQuery as $row)
		{
			$news[] = ['id' => $row['id'], 'date' => $row['date'], 'title' => $row['title'], 'announce' => $row['announce']];
		}

		return $news;
	}
}

$news = new News();

$data = $news->getData();
$news->printData($data);
