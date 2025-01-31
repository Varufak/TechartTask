<?php

define("APP_DIR", __DIR__ . "/app");

spl_autoload_register(
	function($class)
	{
		//"Models\NewsModel" => "/Models/",
		$namespace = "";
		$fileName = "";

		if ($lastNsPos = strrpos($class, '\\')) {
			$namespace = substr($class, 0, $lastNsPos);
			$class = substr($class, $lastNsPos + 1);
			$fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
		}
		$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

		include APP_DIR . "/$fileName";
	}
);
