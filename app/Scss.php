<?php

use ScssPhp\ScssPhp\Compiler;

class Scss
{
	public static function getCompiledPath($scss)
	{
		$css = preg_replace("/\.scss/", ".css", $scss);

		$scssPath = self::getPath($scss);
		$cssPath = self::getPath($css);

		if (!file_exists($cssPath || filemtime($cssPath) < filemtime($scssPath))) {
			$compiler = new Compiler;

			$compiledCss = $compiler->compileFile($scssPath)->getCss();
			file_put_contents($cssPath, $compiledCss);
		}

		$cssLinkPath = self::getLinkPath($css);

		return $cssLinkPath;
	}

	private static function getLinkPath($fileName)
	{
		$path = "/styles/{$fileName}";

		return $path;
	}

	private static function getPath($fileName)
	{
		$path = realpath(__DIR__ . "/../styles/{$fileName}");

		return $path;
	}
}