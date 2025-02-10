<?php
include __DIR__ . "/autoload.php";
include __DIR__ . "/vendor/autoload.php";

$controller = "";
$method = "";
$args = array();

$matches;
if (preg_match("/^\/$/", $_SERVER["REQUEST_URI"])) {
	$controller = new Controllers\MainController();
	$method = "actionMain";
} elseif (preg_match("/^\/news\/$/", $_SERVER["REQUEST_URI"])) {
	$controller = new Controllers\NewsController();
	$page = 1;
	$method = "actionList";
	$args = array($page);
} elseif (preg_match("/^\/news\/page-(\d+)\/$/", $_SERVER["REQUEST_URI"])) {
	$controller = new Controllers\NewsController();
	preg_match("/[0-9]/", $_SERVER["REQUEST_URI"], $matches, PREG_OFFSET_CAPTURE);
	$page = $matches[0][0];
	$method = "actionList";
	$args = array($page);
} elseif (preg_match("/^\/news\/[0-9]+\/$/", $_SERVER["REQUEST_URI"])) {
	$controller = new Controllers\NewsController();
	preg_match("/([0-9]+)/", $_SERVER["REQUEST_URI"], $matches, PREG_OFFSET_CAPTURE);
	$id = $matches[0][0];
	$method = "actionDetail";
	$args = array($id);
} else {
	$controller = new Controllers\Controller;
	$method = "notFound";
}
if (!$controller == "") {
	call_user_func_array(array($controller, $method), $args);
}
