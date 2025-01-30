<?php
include "./src/init.php";

class DetailNews
{
	private $conn;
	public function __construct()
	{
		$this->conn = DB::getConnection();
	}
	public function getData()
	{
		$detailNewsId = $_GET['id'];
		$detailNewsQuery = $this->conn->prepare('SELECT title, announce, date, content, image FROM news WHERE id = ?');
		$detailNewsQuery->execute([$detailNewsId]);
		$detailNews = $detailNewsQuery->fetch(PDO::FETCH_ASSOC);
		return $detailNews;
	}
	public function printData($data)
	{
		echo json_encode($data);
	}
}

$detailNews = new DetailNews();
$data = $detailNews->getData();
$detailNews->printData($data);
