<?php
 	namespace Controllers;

 	use Controllers\Controller;

 	class MainController extends Controller
 	{
 		public function actionMain()
		{
			$doDrawHeaderLine = true;
			$title = "Главная";
			include __DIR__ . "/../../views/mainPage.php";
		}
 	}