<?php

class DB
{
	private static $connection;

	public static function getConnection()
	{
		include "./src/config.php";
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		self::$connection = $conn;
		return self::$connection;
	}
}