<?php
	namespace Controllers;

	class Controller
	{
		public function notFound()
		{
			http_response_code(404);
			$title = "Not Found";
			include __DIR__ . "/../../views/notFound.php";
			die();
		}
	}