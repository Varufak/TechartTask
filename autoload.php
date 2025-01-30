<?php

define("APP_DIR", __DIR__ . "/app");

spl_autoload_register(
	function ($class)
	{
		include "./app/models/" . $class . ".php";
	}
);
