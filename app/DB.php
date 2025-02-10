<?php

class DB
{
	private static $connection;

	public static function getConnection()
	{
		if (!isset(self::$connection)) {
			include __DIR__ . "/../configs/DBconfig.php";
			$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$connection = $conn;
		}

		return self::$connection;
	}
}
