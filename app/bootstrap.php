<?php if ( ! defined('ROOT')) die ("err");
/**
 * bootstrap.php
 */

class Autoloader
{
	public static $autoloader = [
		'Model' => '',
		'Products' => 'models',
		'Routes' => '',
		'Template' => '',

	];
}


function koanic_autoloader($classname)
{
	echo $classname;
	if (array_key_exists($classname, Autoloader::$autoloader)) {
		echo "REQUIRED!";
		$folder = Autoloader::$autoloader[$classname];
		$class = ROOT . DS . 'app'. DS . ($folder ? ($folder . DS) : '') . strtolower($classname) . '.php';

		require_once($class);
	}
}

spl_autoload_register('koanic_autoloader');
