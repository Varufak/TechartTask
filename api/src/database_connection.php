<?php

class DatabaseConnection
{
	private $connection;
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "news";
	private static $instance;

	private function __construct() {
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection = $conn;
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
			die();
		}
	}
		public static function getInstance(): DatabaseConnection{
				if (!isset(self::$instance)) {
						self::$instance = new static();
				}
				return self::$instance;
		}

		public function getConnection(){
			return $this->connection;
		}
}