<?php
namespace Controllers;

use Scss;

class Controller
{
	public function notFound()
	{
		$doDrawHeaderLine = true;
		http_response_code(404);
		$title = "Not Found";
		$this->render("notFound", [
			"styles" => Scss::getCompiledPath("styles.scss"),
			"title" => $title,
			"doDrawHeaderLine" => $doDrawHeaderLine
		]);
		die();
	}
	public function render($template, $params)
	{
		extract($params);
		ob_start();
		include __DIR__ . "/../../views/{$template}.php";
		$content = ob_get_clean();
		include "./views/layout/layout.php";
	}
}