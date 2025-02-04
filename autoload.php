<?php

define("APP_DIR", __DIR__ . "/app");

spl_autoload_register(
	function($class)
	{
		$fileName = str_replace("\\", DIRECTORY_SEPARATOR, $class);

		include APP_DIR . "/{$fileName}.php";
	}
);
