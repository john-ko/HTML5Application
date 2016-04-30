<?php if ( ! defined('ROOT')) die ("err");
/**
 * bootstrap.php
 */

<<<<<<< Updated upstream
class Autoloader
{
	public static $autoloader = [
		'Model' => '',
		'Products' => 'models',
		'Routes' => '',
		'Template' => '',

	];
}
=======
require('kaonic.php');
require('routes.php');
require('request.php');
>>>>>>> Stashed changes

function kaonic_autoloader($classname)
{
	if (array_key_exists($classname, Autoloader::$autoloader)) {
		$folder = Autoloader::$autoloader[$classname];
		$class = ROOT . DS . 'app'. DS . ($folder ? ($folder . DS) : '') . strtolower($classname) . '.php';

		require_once($class);
	}
}

spl_autoload_register('kaonic_autoloader');
