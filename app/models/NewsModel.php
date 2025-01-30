<?php

include "./api/src/init.php";

class NewsModel
{
	public static function getCount()
	{
		$countQuery = DB::getConnection()->prepare('SELECT COUNT(*) FROM news');
		$countQuery->execute();
		$count = $countQuery->fetchColumn();

		return $count;
	}
	public static function getRows($offset, $limit)
	{
		$rowsQuery = DB::getConnection()->prepare('SELECT id, date, title, announce FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset');
		$rowsQuery->bindParam(':limit', $limit, PDO::PARAM_INT);
		$rowsQuery->bindParam(':offset', $offset, PDO::PARAM_INT);
		$rowsQuery->execute();
		$rows = [];
		foreach ($rowsQuery as $row) {
			$rows[] = ['id' => $row['id'], 'date' => $row['date'], 'title' => $row['title'], 'announce' => $row['announce']];
		}

		return $rows;
	}
	public static function getItem($id)
	{
		$itemQuery = DB::getConnection()->prepare('SELECT title, announce, date, content, image FROM news WHERE id = ?');
		$itemQuery->execute([$id]);
		$item = $itemQuery->fetch(PDO::FETCH_ASSOC);

		return $item;
	}
}