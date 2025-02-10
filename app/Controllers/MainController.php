<?php
namespace Controllers;

use Controllers\Controller;
use Scss;

class MainController extends Controller
{
	public function actionMain()
	{
		$doDrawHeaderLine = true;
		ob_start();
		$title = "Главная";
		$this->render("mainPage", [
			"styles" => Scss::getCompiledPath("styles.scss"),
			"title" => $title,
			"doDrawHeaderLine" => $doDrawHeaderLine
		]);
	}
}
