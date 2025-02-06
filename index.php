<?php
	include __DIR__ . "/autoload.php";

	use Controllers\Controller;
	use Controllers\NewsController as NewsController;
	use Controllers\MainController as MainController;

	$class = "";
	$method = "";
	$args = array();

	$matches;
	if (preg_match("/^\/$/", $_SERVER["REQUEST_URI"])) {
		$class = new MainController();
		$method = "actionMain";
	} elseif (preg_match("/^\/news\/$/", $_SERVER["REQUEST_URI"])) {
		$class = new NewsController();
		$page = 1;
		$method = "actionList";
		$args = array($page);
	} elseif (preg_match("/^\/news\/page-(\d+)\/$/", $_SERVER["REQUEST_URI"])) {
		$class = new NewsController();
		preg_match("/[0-9]/", $_SERVER["REQUEST_URI"], $matches, PREG_OFFSET_CAPTURE);
		$page = $matches[0][0];
		$method = "actionList";
		$args = array($page);
	} elseif (preg_match("/^\/news\/[0-9]+\/$/", $_SERVER["REQUEST_URI"])) {
		$class = new NewsController();
		preg_match("/([0-9]+)/", $_SERVER["REQUEST_URI"], $matches, PREG_OFFSET_CAPTURE);
		$id = $matches[0][0];
		$method = "actionDetail";
		$args = array($id);
	} else {
		$controller = new Controller;
		$controller->notFound();
	}
	if (!$class == "") {
		call_user_func_array(array($class, $method), $args);
	}
?>