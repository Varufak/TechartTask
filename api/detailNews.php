<?php
include "./src/init.php";

class DetailNewsController
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

$detailNewsController = new DetailNewsController();
$data = $detailNewsController->getData();
$detailNewsController->printData($data);
